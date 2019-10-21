<?php
namespace app\admin\controller;
use think\Controller;
use catetree\Catetree; //无限分类
class Cate extends Controller
{
    public function lst()
    {
    	$cateRes=db('cate')->select();
        $cate=new Catetree();
        $cateRes=$cate->catetree($cateRes);

    	$this->assign([
    		'cateRes'=>$cateRes,
    	]);
        return view('list');
        //模板名字一样的时候
        //不用写模板名字
    }
    public function add()
    {

    	if(request()->isPost()){
    		$data=input('post.');
            //判断是否可以添加子栏目
            if(in_array($data['pid'], ['1','3'])){
                $this->error('系统栏目不能作为上级栏目');
            }
            if($data['pid']==2){
                $data['cate_type']=3;
            }
            $cateId=db('cate')->field('pid')->find($data['pid']);
            $cateId=$cateId['pid'];
            if($cateId==2){
                $this->error('不能作为上级栏目!');
            }
            //栏目类型1、系统分类 2、帮助分类、3网店帮助 4、网店信息 5、普通分类
    		//验证
            //
    		// $validate = validate('Brand');
    		// if(!$validate->check($data)){
    		// 	$this->error($validate->getError());
    		// }
    		$add=db('cate')->insert($data);
    		if($add){
    			$this->success('添加文章分类成功','lst');
    		}else{
    			$this->error('添加文章分类失败','add');
    		}
    	  return;
    	}

          $cateRes=db('cate')->select();
          $this->assign([
                'cateRes'=>$cateRes, 
            ]);
        return view();
    }

    public function edit()
    {
    	if(request()->isPost()){
    		$data=input('post.');
    		$save=db('cate')->update($data);
    		if($save!==false){
    			$this->success('修改成功','lst');
    		}else{
    			$this->error('修改失败','edit');
    		}
    		return;
    	    }
        	$id=input('id');
        	$brands=db('cate')->find($id);
        	//var_dump($brands);die;
        	$this->assign([
        		'brands'=>$brands
        	]);
             return view();
    }

    public function del($id)
    {
         $del=db('cate')->delete($id);
         if($del){
        			$this->success('删除分类成功','lst');
        		}else{
        			$this->error('删除分类失败','add');
        		}
    }
}
