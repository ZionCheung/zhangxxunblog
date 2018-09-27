<?php

namespace app\index\controller;

use app\index\controller\Currency as indexCurr;
use app\common\model\Banner as bannerModel;
use app\common\model\Article as articleModel;
use app\index\model\WebCate as cateModel;
use app\common\model\Tags as tagsModel;

class Index extends indexCurr
{
    // 网站首页
    public function index()
    {
        $banner = bannerModel::getViewBreAll(1);
        $article = articleModel::getNewestArticle();
        $articleRecommend = articleModel::getBloggerArticle();
        $articleOptimization = articleModel::getOptimizationArticle();
        foreach ($article as &$v) {
            $v['cate'] = cateModel::getWhereCate($v['cid']);
        }
        $tags = tagsModel::getAllTags();
        $this->assign('tags', $tags);
        $this->assign('article', $article);
        $this->assign('banner', $banner);
        $this->assign('recommend', $articleRecommend);
        $this->assign('optimization',$articleOptimization);
        return $this->fetch('home/index');
    }
}