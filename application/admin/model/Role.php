<?php

namespace app\admin\model;

use think\Model;

class Role extends Model
{
    protected $table = 'zx_auth_group';

    // 角色添加
    public static function addRole($data)
    {
        if (empty($data)) {
            return false;
        }
        if (empty($data['data'])) return '至少选择一项权限!';
        $roleId = implode(',', $data['data']);
        $roleTitle = rtrim($data['title']);
        $roleDesc = $data['desc'];
        $roleInfo = [
            'title' => $roleTitle,
            'status' => 1,
            'rules' => $roleId,
            'describe' => $roleDesc
        ];
        $role = new Role;
        $result = $role->validate('Role.add')->save($roleInfo);
        if (false === $result) {
            return $role->getError();
        } else {
            return '增加成功!';
        }
    }
    // 获取所有角色/分页
    public static function getAllRolePage($page = 1, $keywords = "")
    {
        $keywords = empty($keywords) ? '' : $keywords;
        $roleData = [];
        $role = self::where('title|describe', 'like', '%' . $keywords . '%')
            ->paginate($page, false, ['query' => request()->param()]);
        $roleData = $role->toArray();
        $roleData['page'] = $role->render();
        return $roleData;
    }
    // 删除角色
    public static function deleteRole($id)
    {
        $role = self::destroy($id);
        if ($role) {
            return '删除成功!';
        } else {
            return '删除失败!';
        }
    }
    // 启用/禁用角色
    public static function updateOnOffRole($id)
    {
        if (!intval($id)) return false;
        $role = self::where('id', 'eq', $id)->field('status')->find();
        $roleData = $role->toArray();
        if ($roleData['status'] === 1) {
            $roleStatus = self::where('id', 'eq', $id)->update(['status' => 0]);
        } else {
            $roleStatus = self::where('id', 'eq', $id)->update(['status' => 1]);
        }
        return $roleStatus;
    }
    // 获取角色拥有的规则
    public static function getRoleRule($id)
    {
        if (empty($id)) return false;
        $role = self::where('id', 'eq', $id)
            ->field('id,title,rules,describe')
            ->find();
        $roleData = $role->toArray();
        $roleData['rules'] = explode(',', $roleData['rules']);
        return $roleData;
    }
    // 角色编辑处理
    public static function updateRole($data)
    {
        if (empty($data)) return false;
        if (empty($data['data'])) return '至少拥有一项权利!';
        $roleId = intval($data['id']);
        $rules = implode(',', $data['data']);
        $describe = trim($data['desc']);
        $roleData = [
            'rules' => $rules,
            'describe' => $describe
        ];
        $role = new Role;
        $roleInfo = $role->validate('Role.updata')->save($roleData, ['id' => $roleId]);
        if ($roleInfo === false) {
            return $role->getError();
        } else {
            return '修改成功!';
        }
    }
    // 获取所有角色
    public static function getAllRole()
    {
        $roleData = [];
        $role = self::where('status', 'eq', 1)->field('id,title')->select();
        foreach ($role as $v) {
            $roleData[] = $v->toArray();
        }
        return $roleData;
    }
    // 获取管理员角色
    public static function getWhereRole($data)
    {
        if (empty($data)) return false; 
        $role = self::all($data);
        $roleData = [];
        foreach ($role as $v) {
            $roleData[] = $v ->title;
        }
        return $roleData;
    }
}
