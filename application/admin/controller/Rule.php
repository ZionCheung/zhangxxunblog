<?php

namespace app\admin\controller;

use app\admin\controller\Backstage as back;
use app\admin\model\Rule as ruleModel;
use think\Request;

class Rule extends back
{
    // 权限规则列表
    public function rule(Request $request, $key = '')
    {
        $rule = ruleModel::getAllRulePage(8, $key);
        $this->assign('ruleInfo', $rule);
        return $this->fetch('rule/rule');
    }
    // 权限规则添加
    public function addRule()
    {
        $rule = ruleModel::getAllTopRule();
        $this ->assign('ruleData',$rule);
        return $this->fetch('rule/addrule');
    } 
    // 权限规则添加处理
    public function addRuleHandle(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $ruleInfo = $request->post();
        $ruleData = ruleModel::addRule($ruleInfo);
        if ($ruleData === true) {
            $response = [
                'errno' => 0
            ];
        } else {
            $response = [
                'errno' => $ruleData
            ];
        }
        return json($response);
    }
    // 权限规则删除
    public function deleteRule(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在!');
        $ruleId = $request->post('id');
        $rule = ruleModel::deleteRule($ruleId);
        if ($rule) {
            $response = [
                'errno' => 0
            ];
        } else {
            $response = [
                'errno' => -1
            ];
        }
        return json($response);
    }
    // 权限规则编辑
    public function updateRule($id)
    {
        $ruleDate = ruleModel::getRule($id);
        $this->assign('rule', $ruleDate);
        return $this->fetch('rule/updaterule');
    }
    // 权限规则编辑处理
    public function updateRuleHandle(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $rule = $request->post();
        $ruleInfo = ruleModel::updateRule($rule);
        if ($ruleInfo === true) {
            $response = [
                'errno' => 0
            ];
        }else{
            $response = [
                'errno' => $ruleInfo
            ];
        }
        return json($response);
    }
    // 权限规则开关
    public function updataOnOffRule (Request $request) {
        if (!$request ->isAjax()) abort(404,'页面不存在!');
        $ruleId = $request ->post('id','','intval');
        $ruleStatus = $request ->post('data','','intval');
        $rule = ruleModel::updataOnOffRule($ruleStatus,$ruleId);
        if (!empty($rule)) {
            $response = [
                'errno' => 0
            ];
        }else{
            $response = [
                'errno' => -1
            ];
        }
        return json($response);
    }
}