<?php

namespace app\index\controller;

use app\index\controller\Currency as indexCurr;
use app\common\model\Article as articleModel;
use app\common\model\Tags as tagsModel;
use app\common\model\Comment as commentModel;
use think\Request;
use think\Session;

class Details extends indexCurr
{
    // 文章详情页
    public function details($cate, $serial)
    {
        if (empty($serial)) abort(404, '页面不存在');
        $article = articleModel::getArticleDetails($serial);
        $tags = tagsModel::getAllWhereTags($article['lid']);
        $articleId = intval(substr($serial, 14));
        $comment = commentModel::getWhereAllComment($articleId);
        $this->assign('comment', $comment);
        $this->assign('page',$comment['page']);
        $this->assign('article', $article);
        $this->assign('tags', $tags);
        return $this->fetch('home/details');
    }
    // 文章点击量
    public function articleClick(Request $request)
    {
        if (!$request->isAjax()) abort(404, '没有你要的页面');
        $id = $request->post('aid');
        $article = articleModel::setArticleClick($id);
    }
    // 关注文章
    public function articleLike(Request $request)
    {
        if (!$request->isAjax()) abort(404, '没有你要的页面');
        $id = $request->post('id');
        $ip = $request->ip();
        $sessionIs = Session::has('currArticle');
        if ($sessionIs) {
            if (in_array($ip, session('currArticle')) && in_array($id, session('currArticle'))) {
                return '您今天已经点过赞了,请明天再来哦!';
            }
        }
        $article = articleModel::setArticleLike($id);
        if ($article) {
            $data = [
                'ip' => $ip,
                'articleId' => $id,
            ];
            session('currArticle', $data);
            $response = [
                'errno' => 0,
                'errmge' => '点赞成功,感谢你的点赞!'
            ];
        } else {
            $response = [
                'errmge' => '系统错误,管理员关闭了点赞功能!'
            ];
        }
        return json($response);
    }
    // 文章评论
    public function articleComment(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $commentData = $request->post();
        $commentIp = $request->ip();
        $comment = commentModel::addComment($commentData, $commentIp);
        return json($comment);
    }
}