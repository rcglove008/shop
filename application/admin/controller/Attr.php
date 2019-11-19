<?php
namespace app\admin\controller;

use think\Controller;

class Attr extends Controller
{
    public function lst()
    {
        $typeId = input('type_id');
        //传值判断类型
        // if($typeId){
        //     $map['type_id']=['=',$typeId];
        // }else{
        //     $map=1;
        // }
        // 修改为三元
        $typeId?$map['type_id']=['=',$typeId]:$map=1;
        //注意：连表查询链接表arrt和表type
        $AttrRes = db('attr')->alias('a')->field('a.*,t.type_name')->join('type t',"a.type_id=t.id")->where($map)-> order('a.id DESC')->paginate(1);
        $this->assign([
            'AttrRes' => $AttrRes,
        ]);
        return view('list');
        //模板名字一样的时候
        //不用写模板名字t
    }
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $data['attr_values'] = str_replace('，', ',', $data['attr_values']);

            //验证
            $validate = validate('Attr');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            $add = db('Attr')->insert($data);
            if ($add) {
                $this->success('添加类型成功', 'lst');
            } else {
                $this->error('添加类型失败', 'add');
            }
            return;
        }
        $typeRes = db('type')->select();
        //var_dump($typeRes);die;
        $this->assign([
            'typeRes' => $typeRes,
        ]);
        return view();
    }

    public function edit()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $data['attr_values'] = str_replace('，', ',', $data['attr_values']);
            // 验证
            $validate = validate('Attr');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            $save = db('attr')->update($data);
            if ($save !== false) {
                $this->success('修改成功', 'lst');
            } else {
                $this->error('修改失败', 'edit');
            }
            return;
        }
        $id = input('id');
        $Attrs = db('Attr')->find($id);
        $typeRes = db('type')->select();
        //var_dump($Attrs);die;
        $this->assign([
            'Attrs' => $Attrs,
            'typeRes' => $typeRes,
        ]);
        return view();
    }

    public function del($id)
    {
        $del = db('Attr')->delete($id);
        if ($del) {
            $this->success('删除商品属性类型成功', 'lst');
        } else {
            $this->error('删除商品属性类型失败', 'add');
        }
    }

}
