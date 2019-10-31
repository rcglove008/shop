<?php
namespace app\admin\controller;

use think\Controller;

class Conf extends Controller
{
    public function conflist(){
        $conf=db('conf');
        $ShopConfRes= $conf->where(array('conf_type' =>1)) ->order('sort DESC')->select();
        $GoodsConfRes= $conf->where(array('conf_type' =>1)) ->order('sort DESC')->select();
        $this->assign([
            'ShopConfRes'=> $ShopConfRes,
            'GoodsConfRes'=> $GoodsConfRes,
        ]);
        return view();
    }


    public function lst()
    {   
    $conf=db('conf');
    if (request()->isPost()) {
        $data = input('post.');
            foreach ($data['sort'] as $k => $v) {
                $conf->where('id','=',$k)->update(['sort'=>$v]);
            }
            $this->success('排序成功');
        }

        $confRes = $conf->order('sort DESC')->paginate(10);

        $this->assign([
            'confRes' => $confRes,
        ]);
        return view('list');
        //模板名字一样的时候
        //不用写模板名字
    }
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            if ($data['form_type']=='radion'||$data['form_type']=='select'||$data['form_type']=='checkbox') {
                $data['values']=str_replace('，', ',', $data['value']);
                $data['value']=str_replace('，', ',', $data['value']);
            }


            //验证
            $validate = validate('conf');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            $add = db('conf')->insert($data);
            if ($add) {
                $this->success('添加成功', 'lst');
            } else {
                $this->error('添加失败', 'add');
            }
            return;
        }
        return view();
    }

    public function edit()
    {
        if (request()->isPost()) {
            $data = input('post.');
            if ($data['form_type']=='radion'||$data['form_type']=='select'||$data['form_type']=='checkbox') {
                $data['values']=str_replace('，', ',', $data['value']);
                $data['value']=str_replace('，', ',', $data['value']);
            }

            //验证
            $validate = validate('conf');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            $save = db('conf')->update($data);
            if ($save !== false) {
                $this->success('修改成功', 'lst');
            } else {
                $this->error('修改失败', 'edit');
            }
            return;
        }
        $id = input('id');
        $confs = db('conf')->find($id);
        //var_dump($confs);die;
        $this->assign([
            'confs' => $confs,
        ]);
        return view();
    }

    public function del($id)
    {
        $del = db('conf')->delete($id);
        if ($del) {
            $this->success('删除成功', 'lst');
        } else {
            $this->error('删除失败', 'add');
        }
    }

}
