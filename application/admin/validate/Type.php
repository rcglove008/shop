<?php
namespace app\admin\Validate;
use think\Validate;

class Type extends Validate
{
protected $rule =   [
    'type_name'  => 'require|max:12',
    ];
    
protected $message  =   [
    'type_name.require' => '名称必须',
    'type_name.max'  => '最大12个字',
    ];

}