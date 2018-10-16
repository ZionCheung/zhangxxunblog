<?php

namespace app\common\model;

use think\Model;

class Message extends Model
{
    public static function addMessage($data, $ip)
    {
        if (empty($data)) return false;
        $message = self::where(['mge_ip' => $ip, 'mge_sign' => 0])->find();
        if (!empty($message)) return '留言处理中!';
        $mgeData = [
            'mge_contact' => $data['contact'],
            'mge_content' => $data['content'],
            'mge_time' => time(),
            'mge_ip' => $ip
        ];
        $mgeInfo = new Message;
        $mge = $mgeInfo->validate(true)->save($mgeData);
        if ($mge === false) {
            return $mgeInfo->getError();
        }
        return '留言成功';
    }
}