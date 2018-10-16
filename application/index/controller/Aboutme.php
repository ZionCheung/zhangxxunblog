<?php

namespace app\index\controller;

use app\index\controller\Currency as currIndex;
use app\common\model\Message as messageModel;
use think\Request;

class AboutMe extends currIndex
{   
    // 关于我--页面
    public function aboutMe()
    {
        return $this->fetch('home/aboutme');
    }
    // 留言
    public function addMessage(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $messageData = $request->post();
        $currIp = $request->ip();
        $message = messageModel::addMessage($messageData, $currIp);
        return json($message);
    }
}