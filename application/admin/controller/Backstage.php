<?php 

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\auth\Auth;

class Backstage extends Controller
{
    /**
     * 后台通用方法
     */
    public function _initialize()
    {
        $userSion = session('userSion');
        $username = $userSion['userName'];
        $loginsign = $userSion['loginSign'];
        if (empty($username) || $loginsign != 1) {
            $this->redirect('admin/login/login');
        }
        $this->assign('userId', $userSion['userId']);
        $this->assign('username', $username);
        $this->assign('name',$userSion['name']);
        $mod = request()->module();
        $controller = request()->controller();
        $action = request()->action();
        $auth = new Auth;
        $rule = strtolower($mod . '/' . $controller . '/' . $action);
        // $notCheck = ['admin/index/index','admin/home/home'];
        // if (in_array($rule,$notCheck)) {
        //     return true;
        // }
        // if (!$auth -> check($rule,$userId)){
        //     $this ->error('没有操作权限','admin/home/home');
        // }
    }
}
