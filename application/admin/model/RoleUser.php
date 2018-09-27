<?php

namespace app\admin\model;

use think\Model;

class RoleUser extends Model
{
    protected $table = "zx_auth_group_access";
    // 添加用户时分配权限
    public static function addAccess($data)
    {
        $role = new RoleUser;
        $access = $role->saveAll($data);
        if (!empty($access)) {
            $response = [
                'errno' => 0,
                'errmge' => '添加成功!'
            ];
        } else {
            $response = [
                'errno' => 0,
                'errmge' => '添加成功,但是权限好像出了点问题!'
            ];
        }
        return $response;
    }
    // 获取权限组
    public static function getWhereAccess($data)
    {
        $accData = [];
        $access = self::where('uid', 'eq', $data)
            ->field('group_id')
            ->select();
        if (empty($access)) return false;
        foreach ($access as $v) {
            $accData[] = join('', $v->toArray());
        }
        $accInfo = join(',', $accData);
        return $accInfo;
    }  
    // 修改权限
    public static function updateAccess($data)
    {
        if (empty($data['uid'])) return false;
        $roleDelete = self::where('uid', 'eq', $data['uid'])->delete();
        if (empty($data['gid'])) return '操作成功!';
        $accData = [];
        foreach ($data['gid'] as $v) {
            $accData[] = [
                'uid' => $data['uid'],
                'group_id' => $v
            ];
        }
        $role = new RoleUser;
        $access = $role->saveAll($accData);
        if (!empty($access)) {
            return '修改成功!';
        } else {
            return '系统错误...';
        }
    }
    // 删除权限 
    public static function deleteAccess($data)
    {
        $roleDelete = self::where('uid','eq',$data) ->delete();
    }
}