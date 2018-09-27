<?php

namespace app\admin\Validate;

use think\Validate;

class AdminUser extends Validate
{
    protected $rule = [
        'ad_username' => 'unique:AdminUser',
        'ad_password' => 'require',
        'ad_email' => 'require',
        'ad_name' => 'require',
        'ad_retime' => 'require',
        'ad_phone' => 'require'
    ];

    protected $message = [
        'ad_username.unique' => '用户名已被注册',
        'ad_password.require' => '密码不能为空',
        'ad_email.require' => '邮箱不能为空',
        'ad_name.require' => '昵称不能为空',
        'ad_retime.require' => '系统错误',
        'ad_phone.require' => '手机号码不能为空'
    ];

    protected $scene = [
    ];
}