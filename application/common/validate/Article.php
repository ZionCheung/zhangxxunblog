<?php

namespace app\common\validate;

use think\Validate;


class Article extends Validate
{
    protected $rule = [
        'article_serial' => 'unique:Article',
        'article_name' => 'unique:Article',
        'article_name' => 'require',
        'article_cover' => 'require|min:5',
        'article_content' => 'require',
        'article_author' => 'require',
        'article_time' => 'require',
        'uid' => 'require',
        'cid' => 'require',
        'lid' => 'require',
    ];

    protected $message = [
        'article_serial.unique' => '系统错误',
        'article_name.unique' => '文章标题已经存在!',
        'article_name.require' => '文章标题不能为空',
        'articel_cover.require' => '请先上传文章封面图!',
        'article_cover.min' => '请先上传文章封面图',
        'article_content.require' => '文章内容不能为空!',
        'article_author.require' => '文章作者不能为空',
        'article_time.require' => '系统错误!',
        'uid.require' => '系统错误',
        'cid.require' => '系统错误',
        'lid.require' => '请最少给文章选择一个标签!'
    ];

    protected $scene = [
        'update' => [
           'article_name.require','articel_cover', 'article_content', 'article_author', 'lid', 'cid'
        ]
    ];
}