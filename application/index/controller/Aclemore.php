<?php

namespace app\index\controller;

use app\index\controller\Currency as currIndex;
use app\common\model\Article as articleModel;
use app\index\model\WebCate as cateModel;
use app\common\model\Tags as tagsModel;


class AcleMore extends currIndex
{
    public function acleMore($key = '', $articleCate = '', $tags = '')
    {
        $article = articleModel::getMoreArticlePage($key, $articleCate, $tags, 10);
        if (!empty($article)) {
            foreach ($article['data'] as &$v) {
                $v['cate'] = cateModel::getWhereCate($v['cid']);
                $v['tags'] = tagsModel::getAllWhereTags($v['lid']);
                unset($v['cid']);
                unset($v['lid']);
            }
        }
        $this->assign('articleTotal', $article['count']);
        $this->assign('articleCurrent', $article['total']);
        $this->assign('article', $article['data']);
        $this->assign('page', $article['page']);
        return $this->fetch('home/aclemore');
    }
}