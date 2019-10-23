<?php
namespace app\admin\controller;

use think\Controller;

class Brand extends Controller
{
    public function lst()
    {
        $brandRes = db('brand')->order('id DESC')->paginate(6);
        $this->assign([
            'brandRes' => $brandRes,
        ]);
        return view('list');
        //模板名字一样的时候
        //不用写模板名字
    }
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            //$data['brand_url']
            //strpos 区分大小写  stripos不区分大小写
            if ($data['brand_url'] && stripos($data['brand_url'], 'http://') === false) {
                $data['brand_url'] = 'http://' . $data['brand_url'];
            }
            //上传图片
            if ($_FILES['brand_img']['tmp_name']) {
                $data['brand_img'] = $this->upload();
            }
            //验证
            $validate = validate('Brand');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            $add = db('brand')->insert($data);
            if ($add) {
                $this->success('添加品牌成功', 'lst');
            } else {
                $this->error('添加品牌失败', 'add');
            }
            return;
        }
        return view();
    }

    public function edit()
    {
        if (request()->isPost()) {
            $data = input('post.');
            //$data['brand_url']
            //strpos 区分大小写  stripos不区分大小写
            if ($data['brand_url'] && stripos($data['brand_url'], 'http://') === false) {
                $data['brand_url'] = 'http://' . $data['brand_url'];
            }
            if ($_FILES['brand_img']['tmp_name']) {
                $oldBrands = db('brand')->field('brand_img')->find($data['id']);
                $oldBrandImg = IMG_UPLOADS . $oldBrands['brand_img'];
                if (file_exists($oldBrandImg)) {
                    @unlink($oldBrandImg);
                }
                $data['brand_img'] = $this->upload();
            }
            //验证
            $validate = validate('Brand');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            $save = db('brand')->update($data);
            if ($save !== false) {
                $this->success('修改成功', 'lst');
            } else {
                $this->error('修改失败', 'edit');
            }
            return;
        }
        $id = input('id');
        $brands = db('brand')->find($id);
        //var_dump($brands);die;
        $this->assign([
            'brands' => $brands,
        ]);
        return view();
    }
    public function del($id)
    {
        $del = db('brand')->delete($id);
        if ($del) {
            $this->success('删除品牌成功', 'lst');
        } else {
            $this->error('删除品牌失败', 'add');
        }
    }
    public function upload()
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('brand_img');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if ($file) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'uploads');
            if ($info) {
                // 成功上传后 获取上传信息
                return $info->getSaveName();
            } else {
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }

}
