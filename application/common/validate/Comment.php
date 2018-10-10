<?php

namespace app\common\validate;

use think\Validate;

class Comment extends Validate
{
    protected $rule = [
        'comment_name' => 'require',
        'comment_content' => 'require',
        'comment_time' => 'require',
        'comment_ip' => 'require'
    ];
    protected $message = [
        'comment_name.require' => '系统错误',
        'comment_content.require' => '内容不能为空',
        'comment_time.require' => '系统错误',
        'comment_ip.require' => '系统错误'
    ];
}