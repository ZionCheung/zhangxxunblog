<?php

namespace app\index\controller;

use app\index\controller\Currency as indexCurr;
use app\common\model\Article as articleModel;
use app\common\model\Banner as bannerModel;

class Heart extends indexCurr
{
    public function heart()
    {
        $article = articleModel::getAllCateArticle(3, 12);
        $banner = bannerModel::getBerHeartAllPage(10);
        $this->assign('banner', $banner['data']);
        $this->assign('article', $article['data']);
        $this->assign('page', $article['page']);
        return $this->fetch('home/heart');
    }
}