<?php
namespace app\index\controller;

class Index 
{
    public function index()
    {
        $data = array(
            'name' => 'red_panda',
            'address' => 'China',
        );
        $code=200;
        $msg='ok';
        return json(['data'=>$data,'code'=>$code,'message'=>$msg]);
    }
}
