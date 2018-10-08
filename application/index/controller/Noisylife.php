<?php

namespace app\index\controller;

use app\index\controller\Currency as indexCurr;
use app\common\model\Article as articleModel;
use app\common\model\Banner as bannerModel;

class NoisyLife extends indexCurr
{
    public function noisyLife()
    {
        $article = articleModel::getAllCateArticle(4, 12);
        $banner = bannerModel::getBerLifeAllPage(10);
        $this->assign('banner', $banner['data']);
        $this->assign('article', $article['data']);
        $this->assign('page', $article['page']);
        return $this->fetch('home/noisylife');
    }
}