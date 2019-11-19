<?php
namespace app\admin\Validate;
use think\Validate;

class Attr extends Validate
{
protected $rule =   [
    'attr_name'  => 'require|max:12',
    ];
    
protected $message  =   [
    'attr_name.require' => '名称必须',
    'attr_name.max'  => '最大12个字',
    ];

}