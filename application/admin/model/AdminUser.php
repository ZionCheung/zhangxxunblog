<?php

namespace app\admin\model;

use think\Model;

class AdminUser extends Model
{
    protected $table = "zx_admin_user";
        
        // 添加管理员
    public static function addAdminUser($data, $ip)
    {
        if (empty($data['user'])) return '系统错误';
        $dataInfo = [];
        $roleInfo = [];
        $dataInfo = $data['user'];
        $userName = trim($dataInfo['username']);
        $passWord = md5($dataInfo['password']);
        $regIp = $ip;
        $userData = [
            'ad_username' => $userName,
            'ad_password' => $passWord,
            'ad_email' => $dataInfo['email'],
            'ad_name' => $dataInfo['name'],
            'ad_retime' => time(),
            'ad_phone' => $dataInfo['phone'],
            'ad_regip' => $regIp
        ];
        $user = new AdminUser;
        $userInfo = $user->validate(true)->save($userData);
        if ($userInfo === false) {
            return $user->getError();
        }
        $adUser = self::where('ad_username', 'eq', $userName)->field('id')->find()->id;
        if (empty($data['role'])) {
            return $rulest = [
                'errno' => 0,
                'errmge' => '添加管理员成功,管理员未配置权限'
            ];
        }
        foreach ($data['role'] as $v) {
            $roleInfo[] = [
                'uid' => $adUser,
                'group_id' => $v
            ];
        }
        return $roleInfo;
    }
        // 管理员列表分页
    public static function getAllUserPage($page = 1, $keywords = '')
    {
        $keywords = empty($keywords) ? "" : $keywords;
        $adUserData = [];
        $adUser = self::where('ad_username|ad_email|ad_name|ad_phone', 'like', '%' . $keywords . '%')
            ->field('ad_password', true)
            ->order('ad_retime', 'asc')
            ->paginate($page, false, ['query' => request()->param()]);
        $adUserData = $adUser->toArray();
        $adUserData['page'] = $adUser->render();
        return $adUserData;
    }
        // 删除用户
    public static function deleteAdminUser($data)
    {
        if (empty($data)) return '没有选择需要删除的对象!';
        $deUser = self::destroy($data);
        if ($deUser) {
            return '删除成功!';
        } else {
            return '删除失败!';
        }
    }
        // 修改登陆权限
    public static function updateUserOnOff($data)
    {
        if (empty($data)) return '系统错误!';
        $userSign = self::get($data)->ad_sign;
        if ($userSign === 1) {
            $userData = self::where('id', 'eq', $data)->update(['ad_sign' => 0]);
            if ($userData) return '关闭权限成功!';
        } else {
            $userData = self::where('id', 'eq', $data)->update(['ad_sign' => 1]);
            if ($userData) return '开启权限成功!';
        }
    }
    // 获取管理员信息(条件) 
    public static function getAdUser($data)
    {
        $user = self::where('id', 'eq', $data)->field('ad_username,ad_headimg,ad_name,ad_password')->find();
        $userData = $user->toArray();
        return $userData;
    }
    // 修改管理员
    public static function updateUser($data)
    {
        if (empty($data['imgRoute'])) return '系统错误!';
        $dataInfo = [];
        $route = explode('/', $data['imgRoute']);
        $imgRoute = $route[5];
        $name = trim($data['name']);
        $passWord = $data['password'];
        $userId = $data['id'];
        $newUserHeadRoute = '.' . $data['imgRoute'];
        $userData = self::getAdUser($userId);
        $userHead = $userData['ad_headimg'];
        $userHeadRoute = '.' . substr($data['imgRoute'], 0, strripos($data['imgRoute'], '/')) . '/' . $userHead;
        if ($name == $userData['ad_name'] && empty($passWord) && $imgRoute == $userData['ad_headimg']) {
            return '当前没有任何修改!';
        }
        $passWord = empty($passWord) ? $userData['ad_password'] : md5($passWord);
        $dataInfo = [
            'ad_password' => $passWord,
            'ad_name' => $name,
            'ad_headimg' => $imgRoute
        ];
        $userInfo = self::where('id', 'eq', $userId)->update($dataInfo);
        if ($userInfo) {
            if (file_exists($userHeadRoute)) {
                unlink($userHeadRoute);
            }
            return '修改成功,刷新页面后显示!';
        } else {
            if (file_exists($newUserHeadRoute)) {
                unlink($newUserHeadRoute);
            }
            return '修改失败!';
        }
    }
    // 管理员权限
    public static function getAllUserAccessPage($page = 1, $keywords = '')
    {
        $keywords = empty($keywords) ? "" : $keywords;
        $adUserData = [];
        $adUser = self::where('ad_username|ad_name', 'like', '%' . $keywords . '%')
            ->field('id,ad_username,ad_name')
            ->order('id', 'asc')
            ->paginate($page, false, ['query' => request()->param()]);
        $adUserData = $adUser->toArray();
        $adUserData['page'] = $adUser->render();
        return $adUserData;
    }
    // 获取所有激活的管理员
    public static function getAllSignUser($field = 'id,ad_name', $order = "id")
    {
        $user = self::where('ad_sign', 'eq', 1)->field($field)->order($order, 'asc')->select();
        $userData = [];
        foreach ($user as $v) {
            $userData[] = $v->toArray();
        }
        return $userData;
    }
}
