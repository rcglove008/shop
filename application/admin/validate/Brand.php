<?php
namespace app\admin\Validate;
use think\Validate;

class Brand extends Validate
{
protected $rule =   [
    'brand_name'  => 'require|unique:brand',
    'brand_url'   => 'url',
    'brand_description' => 'min:6',    
    ];
    
protected $message  =   [
    'brand_name.require' => '品牌名称必须',
    'brand_name.unique'     => '品牌不能重复',
    'brand_url.url'   => 'url不正确',
    'brand_description.min'  => '描述最少6个字',
    ];

}