<?php

namespace app\common\validate;

use think\Validate;

class Tags extends Validate
{
    protected $rule = [
        'tags_title' => 'unique:Tags',
        'tags_time' => 'require',
        'tags_color' => 'require'
    ];
    protected $message = [
        'tags_title.unique' => '失败:标签名称重复',
        'tags_time.require' => '系统错误',
        'tags_color.require' => '失败:标签颜色不能为空'
    ];
    protected $scene = [
        'update' => [
            'tags_title','tags_color'
        ],
    ];
}