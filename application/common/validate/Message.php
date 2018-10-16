<?php

namespace app\common\validate;

use think\Validate;

class Message extends Validate
{
    protected $rule = [
        'mge_contact' => 'require',
        'mge_content' => 'require',
        'mge_time' => 'require',
        'mge_ip' => 'require'
    ];
    protected $message = [
        'mge_contact.require' => '联系方式不能为空',
        'mge_content.require' => '留言内容不能为空',
        'mge_time.require' => '系统错误',
        'mge_ip.require' => '系统错误'
    ];
}