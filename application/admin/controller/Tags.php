<?php

namespace app\admin\controller;

use app\admin\controller\Backstage as back;
use app\common\model\Tags as tagsModel;
use think\Request;

class Tags extends back
{
    // 标签列表
    public function tags($key = '')
    {
        $tags = tagsModel::getAllTagsPage(10, $key);
        $this->assign('tags', $tags);
        return $this->fetch('tags/tags');
    }
    // 添加标签
    public function addTags()
    {
        return $this->fetch('tags/addtags');
    }
    // 添加标签处理
    public function addTagsHandle(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在!');
        $tags = $request->post();
        $tagsInfo = tagsModel::addTags($tags);
        return json($tagsInfo);
    }
    // 标签排序
    public function tagsSort(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在!');
        $tagsData = $request->post();
        $tags = tagsModel::setTagsSort($tagsData);
        return json($tags);
    }
    // 标签开关
    public function tagsSign(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在!');
        $tagsData = $request->post('id');
        $tags = tagsModel::setTagsSign($tagsData);
        return json($tags);
    }
    // 标签删除
    public function tagsDelete(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在!');
        $tagsData = $request->post('id');
        $tags = tagsModel::deleteTags($tagsData);
        return json($tags);
    }
    // 标签修改
    public function tagsUpdate($id)
    {
        if (empty($id)) abort(404, '页面不存在');
        $tags = tagsModel::getWhereTags($id);
        $this->assign('tags', $tags);
        return $this->fetch('tags/updatetags');
    }
    // 标签修改处理
    public function updateTagsHandle(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在!');
        $tagsData = $request ->post();
        $tags = tagsModel::updateTags($tagsData);
        return json($tags);
    }
}