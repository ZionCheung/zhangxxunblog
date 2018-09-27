<?php

namespace app\common\validate;

use think\Validate;


class Banner extends Validate
{
    protected $rule = [
        'banner_route' => 'unique:Banner',
        'banner_time' => 'require',
        'banner_link' => 'require',
        'cid' => 'require'
    ];
    protected $message = [
        'banner_route.unique' => '系统错误',
        'banner_time.require' => '系统时间错误',
        'banner_link.require' => '链接地址不能为空',
        'cid' => '所属分类不能为空'
    ];
    protected $scene = [
        'update' => [
            'banner_link'
        ],
    ];
}