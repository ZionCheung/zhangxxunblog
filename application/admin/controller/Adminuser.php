<?php

namespace app\admin\controller;

use app\admin\controller\Backstage as back;
use app\admin\model\Role as roleModel;
use app\admin\model\AdminUser as adUserModel;
use app\admin\model\RoleUser as accessModel;
use think\Session;
use think\Request;
use lib\Updatebase;

class Adminuser extends back
{
    // 管理员列表
    public function adminUser($key = '')
    {
        $adUser = adUserModel::getAllUserPage(12, $key);
        $this->assign('user', $adUser);
        return $this->fetch('user/user');
    }
    // 添加管理员
    public function addAdminUser()
    {
        $role = roleModel::getAllRole();
        $this->assign('role', $role);
        return $this->fetch('user/adduser');
    }
    // 添加管理员处理
    public function addAdminUserHandle(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在!');
        $userData = $request->post();
        $regIp = $request->ip();
        $user = adUserModel::addAdminUser($userData, $regIp);
        if (is_array($user)) {
            $access = accessModel::addAccess($user);
            return json($access);
        }
        return json($user);
    }  
    // 删除管理员
    public function deleteAdminUser(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在!');
        $user = $request->post('id');
        $imgRoute = $request->post('imgRoute');
        $userAccess = accessModel::deleteAccess($user);
        $userData = adUserModel::deleteAdminUser($user);
        if (!empty($imgRoute)) {
            if (file_exists('.' . $imgRoute)) {
                unlink('.' . $imgRoute);
            }
        }
        return json($userData);
    }
    // 登陆权限开关
    public function updateUserOnOff(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在!');
        $user = $request->post('id');
        $userData = adUserModel::updateUserOnOff($user);
        return json($userData);
    }
    // 修改管理员信息
    public function updateUser($uid)
    {
        $userId = session('userSion.userId');
        if ($uid != $userId) abort(404, '页面不存在!');
        $userData = adUserModel::getAdUser($uid);
        $this->assign('userData', $userData);
        return $this->fetch('user/updateuser');
    }
    // 头像上传
    public function updateHeadHandle(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在!');
        $img = $request->post('imgData');
        $userHeadImg = Updatebase::baseImageHandle($img);
        return json($userHeadImg);
    }
    // 修改管理员信息
    public function updateUserHandle(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在!');
        $user = $request->post();
        $user['id'] = session('userSion.userId');
        $userInfo = adUserModel::updateUser($user);
        return json($userInfo);
    }
    // 管理员权限列表
    public function adAccess($key = '')
    {
        $userData = adUserModel::getAllUserAccessPage(8, $key);
        foreach ($userData['data'] as &$v) {
            $v['group_id'] = accessModel::getWhereAccess($v['id']);
            $v['role'] = roleModel::getWhereRole($v['group_id']);
            unset($v['group_id']);
        }
        $this->assign('user', $userData);
        return $this->fetch('user/useraccess');
    }
    // 配置管理员权限
    public function addUserAccess($uid, $uname)
    {
        if (empty($uid) || empty($uname)) abort(404, '页面不存在!');
        $roleData = [];
        $roleData['id'] = $uid;
        $roleData['uname'] = $uname;
        $roleData['role'] = roleModel::getAllRole();
        $access = accessModel::getWhereAccess($uid);
        $access = ($access === false) ? [] : explode(',', $access);
        $this->assign('access', $access);
        $this->assign('roleData', $roleData);
        return $this->fetch('user/addaccess');
    }
    // 权限配置处理
    public function addUserAccessHandle(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在!');
        $roleAcc = $request->post();
        $userAccess = accessModel::updateAccess($roleAcc);
        return json($userAccess);
    }
}