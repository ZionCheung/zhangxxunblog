<?php

namespace app\admin\model;

use think\Model;

class WebCate extends Model
{
    protected $table = 'zx_cate';
        // 分类表所有数据
    public static function aleCateAll()
    {
        $cateInfo = [];
        $cate = self::order('cate_sort', 'asc')->select();
        foreach ($cate as $v) {
            $cateInfo[] = $v->toArray();
        }
        return $cateInfo;
    }
        // 获取所有存在banner的顶级分类
    public static function getTopCate()
    {
        $cateInfo = [];
        $cate = self::where(['cate_belong' => 0, 'cate_banner' => 1])
            ->field('id,cate_name')
            ->order('id', 'asc')
            ->select();
        foreach ($cate as $v) {
            $cateInfo[] = $v->toArray();
        }
        return $cateInfo;
    }
    // 获取banner页分类名称
    public static function getCateName($data)
    {
        if (empty($data)) return false;
        if (!in_array($data, [1, 3, 4])) abort(404, '页面不存在');
        $cate = self::get($data)->cate_name;
        return $cate;
    }
    /**
     * 得到所有有文章的分类
     *
     * @return
     */
    public static function getAllArticleCate()
    {
        $cate = self::where('cate_article', 'eq', 1)->select();
        $cateDate = [];
        if (empty($cate)) return false;
        foreach ($cate as $v) {
            $cateDate[] = $v->toArray();
        }
        return $cateDate;
    }
    /**
     * 获取当前文章分类
     *
     * @param [int] $data
     * @return
     */
    public static function getWhereCate($data)
    {
        if (empty($data)) abort(404, '页面不存在');
        $cate = self::get($data)->getAttr('cate_name');
        if (!$cate) abort(404, '页面不存在'); 
        return $cate;
    }
}