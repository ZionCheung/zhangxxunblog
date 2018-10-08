<?php

namespace app\common\model;

use think\Model;
use think\Session;

class Article extends Model
{
    /**
     * 查询字段内容是否存在
     *
     * @param [string] $data
     * @param string $fieldName
     * @return 
     */
    public static function articleValidation($data, $fieldName = '')
    {
        if (empty($data)) return '名称不能为空!';
        $fieldName = empty($fieldName) ? 'article_name' : $fieldName;
        $article = self::where($fieldName, 'eq', $data)->find();
        if (empty($article)) {
            $response = [
                'errno' => 0,
                'mge' => '文章可添加'
            ];
            return $response;
        }
        return '文章已存在';
    }
    /**
     * 文章添加
     *
     * @param [array] $data
     * @return 
     */
    public static function articleAddHandle($data)
    {
        if (empty($data) || !is_array($data)) return '系统错误';
        // $imgRoute = substr($data['imgRoute'], strripos($data['imgRoute'], '/') + 1);
        $imgRoute = substr($data['imgRoute'], -45);
        $uid = session('userSion.userId');
        $cid = intval($data['cate']);
        $serial = date('ymHi') . $uid . $cid . substr(md5(rand(100, 9999)), rand(1, 20), 4);
        $articleData = [
            'article_serial' => $serial,
            'article_name' => $data['name'],
            'article_cover' => $imgRoute,
            'article_content' => $data['content'],
            'article_author' => $data['author'],
            'article_time' => time(),
            'uid' => $uid,
            'cid' => $cid,
            'lid' => $data['tags']
        ];
        $article = new Article;
        $result = $article->validate(true)->save($articleData);
        if ($result === false) return $article->getError();
        $response = [
            'errno' => 0,
            'mge' => $data['name'] . '--添加成功'
        ];
        return $response;
    }
    /**
     * 文章列表
     *
     * @param [int] $page
     * @param string $start
     * @param string $end
     * @param string $asign
     * @param string $acate
     * @param string $auser
     * @param string $key
     * @return 
     */
    public static function getAllArticle($page, $start = '', $end = '', $asign = '', $acate = '', $auser = '', $key = '')
    {
        $start = empty($start) ? '' : strtotime($start);
        $end = empty($end) ? time() : strtotime($end);
        $articleData = [];
        $article = self::where('article_recycle', 'eq', 0)
            ->where('article_serial|article_name', 'like', '%' . $key . '%')
            ->where('article_time', 'EGT', $start)
            ->where('article_time', 'ELT', $end)
            ->where('article_sign', 'like', '%' . $asign . '%')
            ->where('cid', 'like', '%' . $acate . '%')
            ->where('uid', 'like', '%' . $auser . '%')
            ->field('article_content', true)
            ->order('article_sort', 'asc')
            ->paginate($page, false, ['query' => request()->param()]);
        $articleData = $article->toArray();
        $articleData['page'] = $article->render();
        return $articleData;
    }

    /**
     * 文章预览
     * $data 文章索引
     * $field 读取字段
     * return 
     */
    public static function getArticlePreView($data, $field = 'id,article_name,article_cover,article_content,article_author')
    {
        if (empty($data)) return '系统错误';
        $article = self::where('article_serial', 'eq', $data)->field($field)->find();
        if (empty($article)) abort(404, '你要的东西已经去了火星!');
        $articleData = $article->toArray();
        return $articleData;
    }
    /**
     * 删除文章
     *
     * @param [int,string] $data
     * @return
     */
    public static function deleteArticle($data)
    {
        if (empty($data)) return '系统错误';
        $article = self::destroy($data);
        if ($article) return '删除成功';
        return '系统错误';
    }
    /**
     * 删除文章到回收站
     *
     * @param [array] $data
     * @return
     */
    public static function moveArticleRecycleBin($data)
    {
        if (empty($data)) return '系统错误';
        $articleData = [];
        if (is_array($data['id'])) {
            foreach ($data['id'] as $k => $v) {
                $articleData[$k]['id'] = $v;
                $articleData[$k]['article_recycle'] = 1;
                $articleData[$k]['article_recycle_time'] = time();
            }
            $articleInfo = new Article;
            $result = $articleInfo->saveAll($articleData);
            return '文章以移入回收站';
        }
        $article = self::where('id', 'eq', $data['id'])->update(['article_recycle' => 1, 'article_recycle_time' => time()]);
        return '文章以移入回收站';
    }
    /**
     * 获取修改数据
     *
     * @param [type] $id
     * @param [type] $serial
     * @return void
     */
    public static function getWhereArticle($id, $serial)
    {
        $articleInfo = self::where('id', 'eq', $id)
            ->where('article_serial', 'eq', $serial)
            ->field('uid,article_recycle,article_sort,article_time,article_like,article_click,article_sign', true)
            ->find();
        if (empty($articleInfo)) return '系统错误';
        $articleData = [];
        $articleData = $articleInfo->toArray();
        $articleData['label'] = explode(',', $articleData['lid']);
        unset($articleData['lid']);
        return $articleData;
    }
    /**
     * 文章修改
     *
     * @param [array] $data
     * @return void
     */
    public static function updateArticle($data)
    {
        if (empty($data)) return '系统错误';
        $imgRoute = substr($data['imgRoute'], -45);
        $articleId = intval($data['id']);
        $articleSerial = $data['serial'];
        $articleData = [
            'article_name' => $data['name'],
            'article_cover' => $imgRoute,
            'article_content' => $data['content'],
            'article_author' => $data['author'],
            'cid' => $data['cate'],
            'lid' => $data['tags']
        ];
        $article = self::get(['id' => $articleId, 'article_serial' => $articleSerial]);
        if (empty($article)) {
            return '系统错误';
        }
        $articleSign = $article->getAttr('article_sign');
        if ($articleSign != 0) {
            return '文章发布状态下不能编辑';
        }
        $articleName = $article->getAttr('article_name');
        $articleCover = $article->getAttr('article_cover');
        $articleContent = $article->getAttr('article_content');
        $articleAuthor = $article->getAttr('article_author');
        $articleCid = $article->getAttr('cid');
        $articleLid = $article->getAttr('lid');
        if ($articleName == $articleData['article_name']) {
            unset($articleData['article_name']);
        }
        if ($articleCover == $articleData['article_cover']) {
            unset($articleData['article_cover']);
        }
        if ($articleContent == $articleData['article_content']) {
            unset($articleData['article_content']);
        }
        if ($articleAuthor == $articleData['article_author']) {
            unset($articleData['article_author']);
        }
        if ($articleCid == $articleData['cid']) {
            unset($articleData['cid']);
        }
        if ($articleLid == $articleData['lid']) {
            unset($articleData['lid']);
        }
        if (empty($articleData)) return '没有需要修改的内容';
        $articleInfo = self::where('id', 'eq', $articleId)->update($articleData);
        if (!empty($articleInfo)) {
            $response = [
                'errno' => 0,
                'mge' => '更新成功'
            ];
            return $response;
        }
        return '系统错误';
    }
    /**
     * 设置文章显示/隐藏
     *
     * @param [int] $data
     * @return
     */
    public static function articleSignOnOff($data)
    {
        if (empty($data)) return '系统错误';
        $article = self::get($data);
        if (empty($article)) return '系统错误';
        $sign = $article->getAttr('article_sign');
        switch ($sign) {
            case 0:
                $newSign = 1;
                $response = '操作成功,文章已发布';
                break;
            case 1:
                $newSign = 0;
                $response = '操作成功,文章将不会被显示';
                break;
        }
        $articleInfo = self::where('id', 'eq', $data)->update(['article_sign' => $newSign]);
        if (!empty($articleInfo)) return $response;
        return '系统错误';
    }
    /**
     * 文章排序
     *
     * @param [type] $data
     * @return void
     */
    public static function articleSort($data)
    {
        if (empty($data)) return '系统错误';
        $articleData['id'] = intval($data['id']);
        $articleData['article_sort'] = empty($data['sort']) ? 0 : $data['sort'];
        $article = self::update($articleData);
        if (!empty($article)) return '更新成功';
        return '系统错误';
    }
    /**
     * 回收站数据
     *
     * @param integer $page
     * @param string $start
     * @param string $end
     * @param string $user
     * @param [string] $key
     * @return
     */
    public static function getArticleRecycleBin($page = 8, $start = '', $end = '', $user = '', $key = "")
    {
        $start = empty($start) ? '' : strtotime($start);
        $end = empty($end) ? time() : strtotime($end);
        $articleData = [];
        $article = self::where('article_recycle', 'eq', 1)
            ->where('article_serial|article_name', 'like', '%' . $key . '%')
            ->where('article_recycle_time', 'EGT', $start)
            ->where('article_recycle_time', 'ELT', $end)
            ->where('uid', 'like', '%' . $user . '%')
            ->field('id,uid,article_serial,article_name,article_author,article_time,article_recycle_time')
            ->order('article_recycle_time', 'desc')
            ->paginate($page, false, ['query' => request()->param()]);
        $articleData = $article->toArray();
        $articleData['page'] = $article->render();
        return $articleData;
    }
    /**
     * 恢复文章
     *
     * @param [array] $data
     * @return
     */
    public static function articleRecovery($data)
    {
        if (empty($data)) return '系统错误';
        $articleData = [];
        if (is_array($data['id'])) {
            foreach ($data['id'] as $k => $v) {
                $articleData[$k]['id'] = $v;
                $articleData[$k]['article_recycle'] = 0;
                $articleData[$k]['article_recycle_time'] = 0;
            }
            $articleInfo = new Article;
            $result = $articleInfo->saveAll($articleData);
            return '已恢复所有选中文章';
        }
        $article = self::where('id', 'eq', $data['id'])->update(['article_recycle' => 0, 'article_recycle_time' => 0]);
        return '文章已恢复';
    }
    /**
     * 获取文章前10
     */
    public static function getNewestArticle($limit = 10, $order = 'article_time', $orderSign = 'desc', $field = 'article_author,uid,lid,article_recycle,article_recycle_time,article_sign,article_sort', $sign = true)
    {
        $article = self::where('article_sign', 'eq', 1)
            ->field($field, $sign)
            ->order($order, $orderSign)
            ->limit($limit)
            ->select();
        $articleData = [];
        foreach ($article as $v) {
            $articleData[] = $v->toArray();
        }
        if (!empty($articleData)) {
            foreach ($articleData as &$vo) {
                $introduction = substr(strip_tags($vo['article_content']), 0, 360);
                $search = array(" ", "　", "\n", "\r", "\t");
                $replace = array("", "", "", "", "");
                $vo['introduction'] = str_replace($search, $replace, $introduction);
                unset($vo['article_content']);
            }
        }
        return $articleData;
    }
    /**
     * 文章详情
     *
     * @param [string] $data
     * @return 
     */
    public static function getArticleDetails($data)
    {
        $articleId = intval(substr($data, 14));
        $articleSerial = substr($data, 0, 14);
        $article = self::where(['id' => $articleId, 'article_serial' => $articleSerial])
            ->field('cid,article_recycle,article_recycle_time,article_sort,article_sign', true)
            ->find();
        if (empty($article)) abort(404, '你要的内容去了火星');
        $articleData = $article->toArray();
        return $articleData;
    }
    /**
     * 文章点击量
     *
     * @param [type] $data
     * @return 
     */
    public static function setArticleClick($data)
    {
        if (empty($data)) return false;
        sleep(10);
        $articleId = intval($data);
        $currClick = self::get($articleId)->article_click + 1;
        $article = self::update(['id' => $articleId, 'article_click' => $currClick]);
        return 'yes';
    }
    /**
     * 文章喜欢量
     *
     * @param [type] $data
     * @return void
     */
    public static function setArticleLike($data)
    {
        if (empty($data)) return '系统错误';
        $articleId = intval($data);
        $currlike = self::get($articleId)->article_like + 1;
        $article = self::update(['id' => $articleId, 'article_like' => $currlike]);
        if (!empty($article)) return true;
    }
    /**
     * 推荐文章
     *
     * @return void
     */
    public static function getBloggerArticle()
    {
        $articleId = self::where('article_sign', 'eq', 1)->field('id')->order('article_like', 'desc')->limit(20)->select();
        $articleData = [];
        foreach ($articleId as $v) {
            $articleData[] = join('', $v->toArray());
        }
        shuffle($articleData);
        $newArticleId = array_slice($articleData, 0, 3);
        $article = self::all($newArticleId);
        $newArticleData = [];
        foreach ($article as $vo) {
            $newArticleData[] = [
                'id' => $vo->id,
                'serial' => $vo->article_serial,
                'name' => $vo->article_name,
                'cover' => $vo->article_cover
            ];
        }
        return $newArticleData;
    }
    /**
     * 优选文章
     *
     * @return void
     */
    public static function getOptimizationArticle()
    {
        $article = self::where('article_sign', 'eq', 1)->field('id,article_serial,article_name,article_cover')
            ->order('article_click', 'desc')
            ->limit(12)
            ->select();
        $articleData = [];
        foreach ($article as $v) {
            $articleData[] = $v->toArray();
        }
        return $articleData;
    }
    /**
     * 获取分类文章/分页
     *
     * @return void
     */
    public static function getAllCateArticle($cate, $page)
    {
        if (empty($cate)) abort(404, '页面不存在');
        $articleCate = intval($cate);
        $article = self::where('cid', 'eq', $cate)
            ->where('article_sign', 'eq', 1)
            ->field('id,article_serial,article_name,article_content,article_cover,article_time,article_like')
            ->order('article_click', 'desc')
            ->paginate($page, false, ['query' => request()->param()]);
        $articleData = $article->toArray();
        $articleData['page'] = $article->render();
        unset($articleData['total']);
        unset($articleData['per_page']);
        unset($articleData['current_page']);
        unset($articleData['last_page']);
        if (!empty($articleData['data'])) {
            foreach ($articleData['data'] as &$vo) {
                $introduction = substr(strip_tags($vo['article_content']), 0, 260);
                $search = array(" ", "　", "\n", "\r", "\t");
                $replace = array("", "", "", "", "");
                $vo['introduction'] = str_replace($search, $replace, $introduction);
                unset($vo['article_content']);
            }
        }
        return $articleData;
    }
}