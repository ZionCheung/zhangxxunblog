<?php

namespace app\index\controller;

use app\index\controller\Currency as indexCurr;
use app\common\model\Article as articleModel;


class Study extends indexCurr
{
    public function study()
    {
        $homeArticle = articleModel::getWhereCateArticle(5, 7);
        $backArticle = articleModel::getWhereCateArticle(6, 7);
        $otherArticle = articleModel::getWhereCateArticle(7, 7);
        $this->assign('homeArticle', $homeArticle);
        $this->assign('backArticle', $backArticle);
        $this->assign('otherArticle', $otherArticle);
        return $this->fetch('home/study');
    }
}