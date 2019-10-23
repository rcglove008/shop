<?php
namespace app\admin\controller;

use catetree\Catetree;
use think\Controller;

//无限分类
class Cate extends Controller
{
    public function lst()
    {
        $cate = new Catetree();
        $cateObj = db('cate');

        if (request()->isPost()) {
            $data = input('post.');
            $cate->cateSort($data['sort'], $cateObj);
            $this->success('排序成功', url('lst'));
        }

        $cateRes = $cateObj->order('sort DESC')->select();
        $cateRes = $cate->catetree($cateRes);

        $this->assign([
            'cateRes' => $cateRes,
        ]);
        return view('list');
        //模板名字一样的时候
        //不用写模板名字
    }
    public function add()
    {
        $cate = new Catetree();
        $cateObj = db('cate');
        if (request()->isPost()) {
            $data = input('post.');
            //判断是否可以添加子栏目
            if (in_array($data['pid'], ['1', '3'])) {
                $this->error('系统栏目不能作为上级栏目');
            }
            if ($data['pid'] == 2) {
                $data['cate_type'] = 3;
            }
            $cateId = $cateObj->field('pid')->find($data['pid']);
            $cateId = $cateId['pid'];
            if ($cateId == 2) {
                $this->error('不能作为上级栏目!');
            }
            //栏目类型1、系统分类 2、帮助分类、3网店帮助 4、网店信息 5、普通分类
            //验证
            //
            // $validate = validate('Brand');
            // if(!$validate->check($data)){
            // $this->error($validate->getError());
            // }
            $add = $cateObj->insert($data);
            if ($add) {
                $this->success('添加文章分类成功', 'lst');
            } else {
                $this->error('添加文章分类失败', 'add');
            }
            return;
        }
        $cateRes = $cateObj->order('sort DESC')->select();
        $cateRes = $cate->catetree($cateRes);
        $this->assign([
            'cateRes' => $cateRes,
        ]);
        return view();
    }

    public function edit()
    {
        $cate = new Catetree();
        $cateObj = db('cate');

        if (request()->isPost()) {
            $data = input('post.');
            $save = $cateObj->update($data);
            //dump($save !== false );die;
            if ($save !== false) {
                $this->success('修改分类成功', 'lst');
            } else {
                $this->error('修改分类失败');
            }
            return;
        }
        $cates = $cateObj->find(input('id'));
        $cateRes = $cateObj->order('sort DESC')->select();
        $cateRes = $cate->catetree($cateRes);
        $this->assign([
            'cateRes' => $cateRes,
            'cates' => $cates,
        ]);
        return view();
    }

    public function del($id)
    {
        $cate = db('cate');
        $cateTree = new Catetree();
        $sonids = $cateTree->childrenids($id, $cate);
        $sonids[] = intval($id); //id插入数组
        $arrSys = [1, 2, 3];
        $arrRes = array_intersect($arrSys, $sonids);
        if ($arrRes) {
            $this->error('不能删除系统分类', 'lst');
        }
        $del = db('cate')->delete($sonids);
        if ($del) {
            $this->success('删除成功', 'lst');
        } else {
            $this->error('删除失败', '');
        }
    }
}
