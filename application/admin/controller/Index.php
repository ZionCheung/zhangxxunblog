<?php

namespace app\admin\controller;

use app\admin\controller\Backstage as back;
use app\admin\model\AdminUser as adUserModel;
use think\Session;

class Index extends back
{
    // 后台首页
    public function index () {
        $userId = session('userSion.userId');
        $userInfo = adUserModel::getAdUser($userId);
        unset($userInfo['ad_password']);
        $this ->assign('user',$userInfo);
        return $this ->fetch('admin/index');
    }
    // 退出登录
    public function loginOut () {
        Session::clear();
        $this ->redirect('admin/login/login');
    } 
}