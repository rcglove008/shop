<?php
namespace app\admin\Validate;

use think\Validate;

class Conf extends Validate
{
    protected $rule = [
        'ename' => 'require|unique:conf',
        'cname' => 'require|unique:conf',
    ];

    protected $message = [
        'ename.require' => '英文配置必须填写',
        'ename.unique' => '英文配置不能重复',
        'cname.require' => '中文配置必须填写',
        'cname.unique' => '中文配置不能重复',
    ];

}
