<?php

namespace app\common\model;

use think\Model;

class Comment extends Model
{
    /**
     * 留言
     *
     * @param [type] $data
     * @param [type] $ip
     * @param integer $level
     * @return void
     */
    public static function addComment($data, $ip, $level = 0)
    {
        if (empty($data)) return false;
        if (empty($ip)) return false;
        $commentData = [
            'comment_name' => '网友',
            'comment_content' => $data['content'],
            'comment_time' => time(),
            'comment_like' => 0,
            'comment_ip' => $ip,
            'comment_level' => $level,
            'article_id' => $data['articleId']
        ];
        $comment = new Comment;
        $commentInfo = $comment->validate(true)->save($commentData);
        if ($commentInfo === false) {
            return $comment->getError();
        }
        // 地址转换接口
        // $urlIp = 'http://ip.taobao.com/service/getIpInfo.php?ip=' . $ip;
        // $addr = file_get_contents($urlIp);
        // $commentAddr = json_decode($addr, true);
        $response = [
            'mge' => '留言成功',
            'time' => date('Y.m.d H:i:s', $commentData['comment_time']),
            // 'addr' => $commentAddr['data']['region'] . ' ' . $commentAddr['data']['city'],
            'errno' => 0
        ];
        return $response;
    }
    /**
     * 获取评论数据
     *
     * @param [type] $data
     * @return void
     */
    public static function getWhereAllComment($data, $page = 10)
    {
        if (empty($data)) return false;
        $comment = self::where('article_id', 'eq', $data)
            ->field('comment_level,article_id', true)
            ->order('comment_like', 'desc')
            ->paginate($page, false, ['query' => request()->param()]);
        $commentData = $comment->toArray();
        $commentData['page'] = $comment->render();
        foreach ($commentData['data'] as &$vo) {
            $vo['content'] = preg_replace("/ \< /", '&lt;', $vo['comment_content']);
            $vo['content'] = preg_replace("/\>/", '&gt;', $vo['comment_content']);
            $vo['content'] = preg_replace("/\n/", '<br/>', $vo['comment_content']);
            $vo['content'] = preg_replace("/\[em_([0-9]*)\]/", '<img src="/static/images/face/$1.gif" border="0" />', $vo['comment_content']);
            unset($vo['comment_content']);
        }
        return $commentData;
    }
    /**
     * 评论点赞
     *
     * @param [type] $data
     * @return void
     */
    public static function setCommentLike($data)
    {
        if (empty($data)) return false;
        $commentId = intval($data);
        $comment = self::get($commentId);
        if (empty($comment)) return '系统错误';
        $currComment = $comment->getAttr('comment_like') + 1;
        $commentInfo = self::where('id', 'eq', $commentId)->update(['comment_like' => $currComment]);
        return $commentInfo;
    }
}