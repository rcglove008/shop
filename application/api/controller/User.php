<?php
namespace app\api\controller;

//use\think\request;
use \think\Validate;



class User extends Comm
{
    public function login()
    {
       echo "www.shop.com";
    }



    public function index($id)
    {

        echo 'controller:user  function :index';
        echo '<br/>';
        echo $id;

        //$res=Db::query('select version()');
        // return json($res);

        //////////////////////////////////////////
        // $data = array(
        //     'name' => 'red_panda',
        //     'address' => 'China',
        // );
        // $code=200;
        // $msg='ok';
        // return json(['data'=>$data,'code'=>$code,'message'=>$msg]);
        
        /////////////////////////////////////////////
        // $request=Request::instance();
        // echo '请求方法：'. $request->method().'<br/>';
        // echo '访问地址：'. $request->ip().'<br/>';
        // echo '请求参数：';
        // dump($request->param());
        // echo "请求参数：仅包含name";
        // dump($request->only(['name','sex']));
        // echo "请求参数:排除name";
        // dump($request->except(['name']));

        // $request=Request::instance();
        //      if ($request->isGet()) {
        //             echo '是get'; }
        //      if ($request->isPut()) {
        //             echo 'isPut';}
        //      if ($request->isPost()) {
        //             echo 'isPost';}
        //      if ($request->isPatch()) {
        //             echo 'Patch';}
        //      if ($request->isDelete()) {
        //             echo 'isDelete';}
        //
        /////////////////////////////////////////
        // $rules = [
        //         'name'  => 'require|max:25',
        //         'age'   => 'number',
        //     ];
        // $msg = [
        //     'name.require' => '名称必须',
        //     'name.max' => '名称不能超25',
        //     'age.number' => '年龄必须是数字',
        // ];
        // $data = input('post.');
        // $validate = new Validate($rules, $msg);
        // $result  = $validate->check($data);
        // if (!$result) {
        //     dump($validate->getError());
        // }

    }
}
