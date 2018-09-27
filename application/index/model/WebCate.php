<?php

namespace app\index\model;

use think\Model;
use lib\Catehandle;

class WebCate extends Model
{
    protected $table = 'zx_cate';

    /**
     * 获取所有分类组合分类
     *
     * @return
     */
    public static function getIndexCate()
    {
        $cate = self::field('id,cate_name,cate_link,cate_belong')
            ->order('cate_sort', 'asc')
            ->select();
        $cateData = [];
        foreach ($cate as $v) {
            $cateData[] = $v->toArray();
        }
        $cataInfo = Catehandle::cateMoreRecomBination($cateData);
        return $cataInfo;
    }
    /**
     * 获取当前文章分类
     *
     * @param [type] $data
     * @return
     */
    public static function getWhereCate($data)
    {
        $cateId = intval($data);
        $cate = self::where('id', 'eq', $cateId)->field('id,cate_name,cate_english_name')->find();
        $cateData = $cate->toArray();
        return $cateData;
    }
}