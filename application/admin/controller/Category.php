<?php
namespace app\admin\controller;

use Catetree\Catetree;
use think\Controller;

//无限分类
class Category extends Controller
{
    public function lst()
    {
        $Category = new Catetree();
        $CategoryObj = db('Category');

        if (request()->isPost()) {
            $data = input('post.');
            $Category->cateSort($data['sort'], $CategoryObj);
            $this->success('排序成功', url('lst'));
        }

        $CategoryRes = $CategoryObj->order('sort DESC')->select();
        $CategoryRes = $Category->Catetree($CategoryRes);

        $this->assign([
            'CategoryRes' => $CategoryRes,
        ]);
        return view('list');
        //模板名字一样的时候
        //不用写模板名字
    }
    public function add()
    {
        $Category = new Catetree();
        $CategoryObj = db('Category');
        if (request()->isPost()) {
            $data = input('post.');
 
            //验证
            // $validate = validate('Category');
            // if(!$validate->check($data)){
            // $this->error($validate->getError());
            // }
           //上传图片
            if ($_FILES['cate_img']['tmp_name']) {
                $data['cate_img'] = $this->upload();
            }

            $add = $CategoryObj->insert($data);
            if ($add) {
                $this->success('添加文章分类成功', 'lst');
            } else {
                $this->error('添加文章分类失败', 'add');
            }
            return;
        }
        $CategoryRes = $CategoryObj->order('sort DESC')->select();
        $CategoryRes = $Category->Catetree($CategoryRes);
        $this->assign([
            'CategoryRes' => $CategoryRes,
        ]);
        return view();
    }

    public function edit()
    {
        $Category = new Catetree();
        $CategoryObj = db('Category');

        if (request()->isPost()) {
            $data = input('post.');
            //上传图片
            if ($_FILES['cate_img']['tmp_name']) {
                $data['cate_img'] = $this->upload();
                $category=$CategoryObj->field('cate_img')->find($data['id']);
                if($category['cate_img']){
                     $imgSrc=IMG_UPLOADS.$category['cate_img'];
                     if (file_exists($imgSrc)) {
                           @unlink($imgSrc);
                    }
                }
            }

            // 验证
            // $validate = validate('Category');
            // if(!$validate->check($data)){
            // $this->error($validate->getError());
            // }

            $save = $CategoryObj->update($data);
            //dump($save !== false );die;
            if ($save !== false) {
                $this->success('修改分类成功', 'lst');
            } else {
                $this->error('修改分类失败');
            }
            return;
        }
        $Categorys = $CategoryObj->find(input('id'));
        $CategoryRes = $CategoryObj->order('sort DESC')->select();
        $CategoryRes = $Category->Catetree($CategoryRes);
        $this->assign([
            'CategoryRes' => $CategoryRes,
            'Categorys' => $Categorys,
        ]);
        return view();
    }

    public function del($id)
    {
        $Category = db('Category');
        $Catetree = new Catetree();
        $sonids = $Catetree->childrenids($id, $Category);
        $sonids[] = intval($id); //id插入数组
        // //删除分类前判断该分类的文章和文章相关缩略图
        // $article=db('article');
        // foreach ($sonids as $k => $v) {
        //     $artRes=$article->field('id,thumb')->where(array('Category_id' =>$v ))->select();
        //     foreach ($artRes as $k1 => $v1) {
        //         $thumbSrc=IMG_UPLOADS.$v1['thumb'];
        //         if (file_exists($thumbSrc)) {
        //             @unlink($thumbSrc);
        //         }
        //     }
        //     # code...
        // }
        $del = $Category->delete($sonids);
        if ($del) {
            $this->success('删除成功', 'lst');
        } else {
            $this->error('删除失败', '');
        }
    }
        //上传图片
    public function upload()
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('cate_img');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if ($file) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'uploads');
            if ($info) {
                // 成功上传后 获取上传信息
                return $info->getSaveName();
            } else {
                // 上传失败获取错误信息
                echo $file->getError();
                die;
            }
        }
    }
}
