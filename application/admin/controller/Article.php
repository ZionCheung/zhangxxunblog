<?php

namespace app\admin\controller;

use app\admin\controller\Backstage as back;
use app\common\model\Tags as tagsModel;
use app\admin\model\WebCate as cateModel;
use app\common\model\Article as articleModel;
use app\admin\model\AdminUser as userModel;
use think\Request;

class Article extends back
{
    // 文章列表
    public function article($start = '', $end = '', $asign = '', $acate = '', $auser = '', $key = '')
    {
        $article = articleModel::getAllArticle(8, $start, $end, $asign, $acate, $auser, $key);
        foreach ($article['data'] as &$v) {
            $v['cate'] = cateModel::getWhereCate($v['cid']);
            $v['tags'] = tagsModel::getAllWhereTags($v['lid']);
            $user = userModel::getAdUser($v['uid']);
            $v['username'] = $user['ad_name'];
            unset($v['cid']);
            unset($v['lid']);
            unset($v['uid']);
        }
        $cate = cateModel::getAllArticleCate();
        foreach ($cate as $key => $vo) {
            $article['kcate'][$key]['catename'] = $vo['cate_name'];
            $article['kcate'][$key]['cateid'] = $vo['id'];
        }
        $user = userModel::getAllSignUser();
        foreach ($user as $key => $kUser) {
            $article['kuser'][$key]['uname'] = $kUser['ad_name'];
            $article['kuser'][$key]['userid'] = $kUser['id'];
        }
        $this->assign('article', $article);
        return $this->fetch('article/article');
    }
    // 添加文章
    public function addArticle()
    {
        $tags = tagsModel::getAllTags();
        $cate = cateModel::getAllArticleCate();
        $this->assign('cate', $cate);
        $this->assign('tags', $tags);
        return $this->fetch('article/addarticle');
    }
    // 文章名称检测
    public function articleNameValidation(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $articleData = $request->post('name');
        $article = articleModel::articleValidation($articleData);
        return json($article);
    }
    // 文章封面图处理
    public function articleCoverMapHandle(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $aricleCover = $request->file('file');
        $aricleCoverRoute = '.' . DS . 'static' . DS . 'upload' . DS . 'article' . DS . 'original' . DS;
        $aricleThumbRoute = '.' . DS . 'static' . DS . 'upload' . DS . 'article' . DS . 'thumb' . DS . date('Ymd') . DS;
        $articleInfo = $aricleCover->move($aricleCoverRoute);
        if ($articleInfo) {
            $articleImgRoute = $aricleCoverRoute . $articleInfo->getSaveName();
            if (!file_exists($aricleThumbRoute)) {
                mkdir($aricleThumbRoute, 0777, true);
            };
            $articleThumbImgRoute = $aricleThumbRoute . $articleInfo->getFilename();
            $articleThumbImg = \think\Image::open($articleImgRoute);
            $articleThumbImg->thumb(1170, 520, \think\Image::THUMB_CENTER)->save($articleImgRoute);
            $articleThumbImg->thumb(238, 140, \think\Image::THUMB_CENTER)->save($articleThumbImgRoute);
            $response = [
                'errno' => 0,
                'mge' => '上传成功!',
                'imgName' => $articleInfo->getSaveName()
            ];
        } else {
            $response = [
                'mge' => $aricleCover->getError()
            ];
        }
        return json($response);
    }
    // 文章添加处理
    public function articleAddHandle(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $atleData = $request->post();
        $article = articleModel::articleAddHandle($atleData);
        return json($article);
    }
    // 文章预览
    public function articlePreView($number)
    {
        $article = articleModel::getArticlePreView($number);
        $this->assign('article', $article);
        return $this->fetch('article/articlepreview');
    }
    // 文章删除
    public function articleDelete(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $articleData = $request->post('id');
        $article = articleModel::deleteArticle($articleData);
        return json($article);
    }
    // 文章回收站
    public function articleRecycleBin(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $articleData = $request->post();
        $article = articleModel::moveArticleRecycleBin($articleData);
        return json($article);
    }
    // 修改文章
    public function articleUpDate($aid, $serial)
    {
        $article = articleModel::getWhereArticle($aid, $serial);
        $tags = tagsModel::getAllTags();
        $cate = cateModel::getAllArticleCate();
        $this->assign('cate', $cate);
        $this->assign('tags', $tags);
        $this->assign('article', $article);
        return $this->fetch('article/updatearticle');
    }
    // 修改文章处理
    public function articleUpDateHandle(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $articleData = $request->post();
        $article = articleModel::updateArticle($articleData);
        return json($article);
    }
    // 文章显示/隐藏处理
    public function articleSign(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $data = $request->post('id');
        $article = articleModel::articleSignOnOff($data);
        return json($article);
    }
    // 文章排序
    public function articleSort(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $articleData = $request->post();
        $article = articleModel::articleSort($articleData);
        return json($article);
    }
    // 文章回收站 
    public function articleRecycleBinList($start = '', $end = '', $key = '', $user = '')
    {
        $article = articleModel::getArticleRecycleBin(8, $start, $end, $user, $key);
        foreach ($article['data'] as &$v) {
            $user = userModel::getAdUser($v['uid']);
            $v['username'] = $user['ad_name'];
            unset($v['uid']);
        }
        $user = userModel::getAllSignUser();
        $this->assign('user', $user);
        $this->assign('article', $article);
        return $this->fetch('article/recycle');
    }
    // 文章恢复
    public function articleRecovery(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $articleData = $request->post();
        $article = articleModel::articleRecovery($articleData);
        return json($article);
    }
}