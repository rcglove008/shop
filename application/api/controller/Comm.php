<?php
namespace app\api\Controller;

use think\Request;
use think\Controller;
class comm extends Controller{
	protected $request;//用来处理参数
	protected function _initialize(){
		parent::_initialize();
		$this->request=Request::instance();
		$this->check_time($this->request->only(['time']));
		$this->check_token($this->request->except());
	}
	//**
	//
	public function check_time($arr){
		if(!isset($arr['time'])||intval($arr['time'])<=1){
			$this->return_msg(400,'时间戳不存在');
		}
		if(time()-intval($arr['time'])>60){
			$this->return_msg(400,'请求超时');
		}
	}
	public function return_msg($code,$msg='',$data=[]){
		$return_data['code']=$code;
		$return_data['msg']=$msg;
		$return_data['data']=$data;
		echo json_encode($return_data);die;
	}
}