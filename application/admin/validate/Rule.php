<?php

namespace app\admin\Validate;

use think\Validate;

class  Rule extends Validate
{
    // 规则验证
    protected $rule = [
        'name' => 'unique:rule',
        'status' => 'number',

    ];
    protected $message = [
        'name.unique' => '当前规则已经存在!',
        'status.number' => '规则状态错误!'
    ];
    protected $scene = [
        'add' => ['name','status'],
        'update' => ['name']
    ];
}