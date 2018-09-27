<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\AdminUser as user;
use think\Session;

class Login extends Controller

{
        // 登陆页面
    public function login()
    {
        return $this->fetch('admin/login');
    }
        // 动态验证码验证
    public function codeHandle(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $code = $request->post('codeVal');
        if (captcha_check($code)) {
            $codeInfo = [
                'errno' => 0
            ];
        } else {
            $codeInfo = [
                'errno' => '-1'
            ];
        }
        return json($codeInfo);
    }
    // 登陆处理
    public function loginHandle(Request $request)
    {
        if (!$request->isPost()) abort(404, '页面不存在');
        $username = $request->post('username', '', 'strtolower');
        $password = $request->post('password', '', 'md5');
        $code = $request->post('code');
        if (captcha_check($code)) {
            $dataInfo = [
                'ad_username' => $username,
                'ad_password' => $password,
                'ad_sign' => 1
            ];
            $user = User::where($dataInfo)->find();
            if (empty($user)) {
                $this->error('账号/密码错误!!!');
            } else {
                $loginInfo = $user->toArray();
                $userSession = [
                    'userId' => $loginInfo['id'],
                    'userName' => $loginInfo['ad_username'],
                    'name' => $loginInfo['ad_name'],
                    'userHead' => $loginInfo['ad_headimg'],
                    'loginSign' => 1
                ];
                session('userSion',$userSession);
                $this ->redirect('admin/index/index');
            }
        }else{
            $this ->error('验证码错误!!!','admin/login/login','',1);
        }
    }
}