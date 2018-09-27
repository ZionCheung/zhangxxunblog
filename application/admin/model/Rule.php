<?php

namespace app\admin\Model;

use think\Model;

class Rule extends Model
{
    protected $table = 'zx_auth_rule';
    // 添加权限规则
    public static function addRule($data)
    {
        foreach ($data as $v) {
            $ruleModel = $v['rmodel'] == 1 ? 'admin' : 'index';
            $ruleController = rtrim($v['rcontroller']);
            $ruleAction = rtrim($v['raction']);
            $ruleName = $ruleModel . '/' . $ruleController . '/' . $ruleAction;
            $ruleTitle = $v['rname'];
            $ruleStatus = intval($v['rstatus']);
            $ruleCondition = empty($v['rcondition']) ? "" : $v['rcondition'];
            $rulePid = intval($v['rpid']);
        }
        $ruleInfo = [
            'name' => $ruleName,
            'title' => $ruleTitle,
            'type' => 1,
            'status' => $ruleStatus,
            'condition' => $ruleCondition,
            'pid' => $rulePid
        ];
        $rule = new Rule;
        $result = $rule->validate('Rule.add')->save($ruleInfo);
        if (false === $result) {
            return $rule->getError();
        } else {
            return true;
        }
    }
    // 获取所有权限规则分页
    public static function getAllRulePage($page = 1, $keywords = '')
    {
        $keywords = empty($keywords) ? '' : $keywords;
        $rule = self::where('name|title', 'like', '%' . $keywords . '%')
            ->field('id,name,title,status')
            ->paginate($page, false, ['query' => request()->param()]);
        $ruleArray = $rule->toArray();
        $ruleArray['page'] = $rule->render();
        return $ruleArray;
    }
    // 删除权限规则
    public static function deleteRule($id)
    {
        $rule = self::destroy($id);
        if ($rule) {
            return true;
        } else {
            return false;
        }
    }
    // 获取单条记录
    public static function getRule($id)
    {
        if (!intval($id)) {
            return false;
        }
        $rule = self::where('id', $id)->find();
        if (empty($rule)) {
            return false;
        }
        $ruleInfo = $rule->toArray();
        $ruleName = explode('/', $ruleInfo['name']);
        $result = [
            'id' => $ruleInfo['id'],
            'model' => $ruleName[0],
            'controller' => $ruleName[1],
            'action' => $ruleName[2],
            'title' => $ruleInfo['title'],
            'status' => $ruleInfo['status'],
            'condition' => $ruleInfo['condition']
        ];
        return $result;
    }
    // 更新数据
    public static function updateRule($data)
    {
        foreach ($data as $v) {
            $ruleModel = $v['rmodel'] == 1 ? 'admin' : 'index';
            $ruleController = rtrim($v['rcontroller']);
            $ruleAction = rtrim($v['raction']);
            $ruleName = $ruleModel . '/' . $ruleController . '/' . $ruleAction;
            $ruleTitle = $v['rname'];
            $ruleCondition = empty($v['rcondition']) ? "" : $v['rcondition'];
            $ruleId = $v['id'];
        }
        $ruleInfo = [
            'name' => $ruleName,
            'title' => $ruleTitle,
            'type' => 1,
            'condition' => $ruleCondition
        ];
        $rule = new Rule;
        $result = $rule->validate('Rule.update')->save($ruleInfo, ['id' => $ruleId]);
        if (false === $result) {
            return $rule->getError();
        } else {
            return true;
        }
    }
    // 权限开关
    public static function updataOnOffRule($data, $id)
    {
        $ruleData = [
            'id' => $id,
            'status' => $data
        ];
        $ruleInfo = self::update($ruleData);
        return $ruleInfo;
    }
    // 获取所有顶级权限
    public static function getAllTopRule () {
        $ruleInfo = [];
        $rule = self::where('pid','eq',0) ->field('id,title') ->select();
        foreach ($rule as $v){
            $ruleInfo[] = $v ->toArray();
        }
        return $ruleInfo;
    }
    // 获取所有权限规则
    public static function getAllRule () {
        $ruleData = [];
        $rule = self::where('status','eq','1') ->field('id,title,pid') ->select();
        if (empty($rule)) {
            return false;
        }
        foreach ($rule as $v) {
            $ruleData[] = $v ->toArray();
        }
        return $ruleData;
    }
    // 获取数据
    public static function getWhereRule ($data) {
        $ruleData = [];
        $rule = self::field('title') ->select($data);
        foreach ($rule as $v) {
            $ruleData [] = $v ->toArray();
        }
        foreach ($ruleData as $vo) {
            $ruleInfo []= implode('',$vo);
        }
        return $ruleInfo;
    }
}