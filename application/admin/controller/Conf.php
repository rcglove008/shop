<?php
namespace app\admin\controller;

use think\Controller;

class Conf extends Controller
{
    public function lst()
    {
        $confRes = db('conf')->order('id DESC')->paginate(6);
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
 
            //验证
            // $validate = validate('conf');
            // if (!$validate->check($data)) {
            //     $this->error($validate->getError());
            // }

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
            //验证
            // $validate = validate('conf');
            // if (!$validate->check($data)) {
            //     $this->error($validate->getError());
            // }

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
