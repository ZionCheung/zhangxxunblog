<?php

namespace app\admin\Validate;

use think\Validate;


class Role extends Validate
{
    protected $rule = [
        'title' => 'unique:role',
        'rules' => 'require',
        'describe' => 'require'
    ];
    
    protected $message = [
        'title.unique' => '当前角色已经存在!',
        'rules.require' => '至少选择一项权限',
        'describe.require' => '请输入角色描述!'
    ];

    protected $scene  = [
        'add' => ['title','rules','describe'],
        'update' => ['rules','describe']
    ];
}