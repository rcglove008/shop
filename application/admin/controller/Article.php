<?php
namespace app\admin\controller;

use think\Controller;

class Article extends Controller
{
    public function lst()
    {
        $articleRes = db('article')->order('id DESC')->paginate(6);
        $this->assign([
            'articleRes' => $articleRes,
        ]);
        return view('list');
        //模板名字一样的时候
        //不用写模板名字
    }
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            //$data['article_url']
            //strpos 区分大小写  stripos不区分大小写
            if ($data['article_url'] && stripos($data['article_url'], 'http://') === false) {
                $data['article_url'] = 'http://' . $data['article_url'];
            }
            //上传图片
            if ($_FILES['article_img']['tmp_name']) {
                $data['article_img'] = $this->upload();
            }
            //验证
            $validate = validate('article');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            $add = db('article')->insert($data);
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
            //$data['article_url']
            //strpos 区分大小写  stripos不区分大小写
            if ($data['article_url'] && stripos($data['article_url'], 'http://') === false) {
                $data['article_url'] = 'http://' . $data['article_url'];
            }
            if ($_FILES['article_img']['tmp_name']) {
                $oldarticles = db('article')->field('article_img')->find($data['id']);
                $oldarticleImg = IMG_UPLOADS . $oldarticles['article_img'];
                if (file_exists($oldarticleImg)) {
                    @unlink($oldarticleImg);
                }
                $data['article_img'] = $this->upload();
            }
            //验证
            $validate = validate('article');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            $save = db('article')->update($data);
            if ($save !== false) {
                $this->success('修改成功', 'lst');
            } else {
                $this->error('修改失败', 'edit');
            }
            return;
        }
        $id = input('id');
        $articles = db('article')->find($id);
        //var_dump($articles);die;
        $this->assign([
            'articles' => $articles,
        ]);
        return view();
    }
    public function del($id)
    {
        $del = db('article')->delete($id);
        if ($del) {
            $this->success('删除品牌成功', 'lst');
        } else {
            $this->error('删除品牌失败', 'add');
        }
    }
    public function upload()
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('article_img');
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
