<?php

namespace app\common\model;

use think\Model;

class Tags extends Model
{
    /**
     * 添加标签
     *
     * @param [array] $data
     * @return
     */
    public static function addTags($data)
    {
        if (empty($data)) return false;
        $tagsData = $data['data'];
        $tags = [
            'tags_title' => $tagsData['tagsname'],
            'tags_time' => time(),
            'tags_sign' => 0,
            'tags_color' => $tagsData['tagscolor'],
            'tags_desc' => $tagsData['tagsdesc']
        ];
        $tagsInfo = new Tags;
        $result = $tagsInfo->validate(true)->save($tags);
        if ($result === false) {
            return $tagsInfo->getError();
        }
        return '添加成功';
    }
    /**
     * 标签列表分页
     *
     * @param integer $page
     * @param string $key
     * @return
     */
    public static function getAllTagsPage($page = 1, $key = '')
    {
        $key = empty($key) ? '' : $key;
        $tagsData = [];
        $tagsPage = self::where('tags_title|tags_desc', 'like', '%' . $key . '%')
            ->order('tags_sort', 'asc')
            ->paginate($page, false, ['query' => request()->param()]);
        $tagsData = $tagsPage->toArray();
        $tagsData['page'] = $tagsPage->render();
        return $tagsData;
    }
    /**
     * tags排序修改
     *
     * @param [array] $data
     * @return 
     */
    public static function setTagsSort($data)
    {
        if (empty($data)) return false;
        $response = [];
        $tId = intval($data['id']);
        $tsort = intval($data['sort']);
        $tags = self::where('id', 'eq', $tId)->update(['tags_sort' => $tsort]);
        if ($tags) {
            $response['errno'] = 0;
            $response['mge'] = '更新成功';
            return $response;
        }
        return '系统错误';
    }
    /**
     * 标签开关
     *
     * @param [intval] $data
     * @return 
     */
    public static function setTagsSign($data)
    {
        if (empty($data)) return false;
        $tId = intval($data);
        $tags = self::get($tId)->tags_sign;
        switch ($tags) {
            case 0:
                $tagsSign = 1;
                break;
            case 1:
                $tagsSign = 0;
                break;
        }
        $tagsInfo = self::where('id', 'eq', $tId)->update(['tags_sign' => $tagsSign]);
        if ($tagsInfo) return '修改成功';
        return '系统错误';
    }
    /**
     * 删除标签
     *
     * @param [string] $data
     * @return
     */
    public static function deleteTags($data)
    {
        if (empty($data)) return false;
        $tags = self::destroy($data);
        if ($tags) return '删除成功';
        return '系统错误';
    }
    /**
     * 获取单个标签数据
     *
     * @param [int] $data
     * @return 
     */
    public static function getWhereTags($data)
    {
        $tId = intval($data);
        $tags = self::where('id', 'eq', $tId)
            ->field('id,tags_title,tags_color,tags_desc')
            ->find();
        if (empty($tags)) abort(404, '页面不存在');
        $tagsData = $tags->toArray();
        return $tagsData;
    }
    /**
     * 标签修改
     *
     * @param [array] $data
     * @return 
     */
    public static function updateTags($data)
    {
        if (empty($data) || !is_array($data)) abort(404, '页面不存在');
        $tagsData = $data['data'];
        $tags = [];
        $tagsId = $tagsData['tid'];
        $tags['tags_title'] = $tagsData['tagsname'];
        $tags['tags_color'] = $tagsData['tagscolor'];
        $tags['tags_desc'] = $tagsData['tagsdesc'];
        $tagsInfo = self::get($tagsId)->tags_title;
        if ($tagsInfo == $tags['tags_title']) {
            unset($tags['tags_title']);
        }
        $upTags = new Tags;
        $result = $upTags->validate('Tags.update')->save($tags, ['id' => $tagsId]);
        if ($result === false) return $upTags->getError();
        return '修改成功';
    }
    /**
     * 获取所有标签
     *
     * @return
     */
    public static function getAllTags()
    {
        $tags = self::where('tags_sign', 'eq', 1)->field('id,tags_title,tags_color')->select();
        $tagsData = [];
        foreach ($tags as $v) {
            $tagsData[] = $v->toArray();
        }
        return $tagsData;
    }
    /**
     * 获取当前文章所有标签
     *
     * @param [string] $data
     * @return 
     */
    public static function getAllWhereTags($data)
    {
        if (empty($data)) abort(404, '页面不存在!');
        $tagsData = [];
        $tags = self::all($data);
        foreach ($tags as $k => $v) {
            $tagsData[$k]['tags_title'] = $v->getAttr('tags_title');
            $tagsData[$k]['tags_color'] = $v->getAttr('tags_color');
            $tagsData[$k]['tags_sign'] = $v->getAttr('tags_sign');
        }
        return $tagsData;
    }
}