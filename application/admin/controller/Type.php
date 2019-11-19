<?php
namespace app\admin\controller;

use think\Controller;

class Type extends Controller
{
    public function lst()
    {

        $TypeRes = db('Type')->order('id DESC')->paginate(6);
        $this->assign([
            'TypeRes' => $TypeRes,
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
            $validate = validate('Type');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            $add = db('Type')->insert($data);
            if ($add) {
                $this->success('添加类型成功', 'lst');
            } else {
                $this->error('添加类型失败', 'add');
            }
            return;
        }
        return view();
    }

    public function edit()
    {
        if (request()->isPost()) {
            $data = input('post.');

            // 验证
            $validate = validate('Type');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            $save = db('Type')->update($data);
            if ($save !== false) {
                $this->success('修改成功', 'lst');
            } else {
                $this->error('修改失败', 'edit');
            }
            return;
        }
        $id = input('id');
        $Types = db('Type')->find($id);
        //var_dump($Types);die;
        $this->assign([
            'Types' => $Types,
        ]);
        return view();
    }

    public function del($id)
    {
        $del = db('Type')->delete($id);
        //删除商品类型下的属性
        db('attr')->where(array('type_id' => $id))->delete();
        if ($del) {
            $this->success('删除类型成功', 'lst');
        } else {
            $this->error('删除类型失败', 'add');
        }
    }

}
