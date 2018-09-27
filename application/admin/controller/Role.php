<?php

namespace app\admin\controller;

use app\admin\controller\Backstage as back;
use app\admin\model\Rule as ruleModel;
use app\admin\model\Role as roleModel;
use lib\Catehandle;
use think\Request;

class Role extends back
{
    // 角色列表
    public function role($key = '')
    {
        $role = roleModel::getAllRolePage(8, $key);
        foreach ($role['data'] as &$v) {
            $v['ruleTitle'] = ruleModel::getWhereRule($v['rules']);
        }
        $this->assign('role', $role);
        return $this->fetch('rule/role');
    }
    // 角色添加
    public function addRole()
    {
        $rule = ruleModel::getAllRule();
        $ruleData = Catehandle::cateMoreRecomBination($rule, 'pid');
        $this->assign('rule', $ruleData);
        return $this->fetch('rule/addrole');
    }
    // 角色添加处理
    public function addRoleHandle(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在!');
        $roleData = $request->post();
        $role = roleModel::addRole($roleData);
        return $role;
    }
    // 角色删除
    public function deleteRole(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在!');
        $roleId = $request->post('id');
        $role = roleModel::deleteRole($roleId);
        return $role;
    }
    // 角色开关
    public function updateOnOffRole(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在!');
        $roleId = $request->post('id');
        $role = roleModel::updateOnOffRole($roleId);
        return $role;
    }
    // 角色编辑
    public function updateRole($id)
    {
        $rule = ruleModel::getAllRule();
        $ruleData = Catehandle::cateMoreRecomBination($rule, 'pid');
        $role = roleModel::getRoleRule($id);
        $this->assign('role', $role);
        $this->assign('rule', $ruleData);
        return $this->fetch('rule/updaterole');
    }
    // 角色编辑处理
    public function updateRoleHandle(Request $request)
    {    
        if (!$request ->isAjax()) abort(404,'页面不存在!');
        $role = $request ->post();
        $roleInfo = roleModel::updateRole($role);
        return $roleInfo;
    }
}