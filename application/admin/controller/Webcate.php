<?php

namespace app\admin\controller;

use app\admin\controller\Backstage as back;
use app\admin\model\WebCate as cate;
use think\Request;
use lib\Catehandle;

class WebCate extends back
{
    // 分类页面
    public function cate()
    {
        $cate = Cate::aleCateAll();
        $cateInfo = Catehandle::cateMoreRecomBination($cate);
        $cateTotal = count($cate);
        $this->assign('cateTotal', $cateTotal);
        $this->assign('cate', $cateInfo);
        return $this->fetch('cate/cate');
    }    
    // 添加分类
    public function addCate(Request $request, $id = 0)
    {
        $cateBelong = intval($id);
        $this->assign('cateBelong', $cateBelong);
        return $this->fetch('cate/addcate');
    }
    // 分类名称验证
    public function cateNameHandle(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $cateName = $request->post('cateName');
        if (empty($cateName)) {
            $response = [
                'errno' => '-1',
            ];
        } else {
            $cateInfo = [
                'cate_name' => $cateName
            ];
            $cate = Cate::where($cateInfo)->find();
            if (empty($cate)) {
                $response = [
                    'errno' => 0
                ];
            } else {
                $response = [
                    'errno' => '-1',
                ];
            }
        }
        return json($response);
    }
    // 添加分类处理
    public function addCateHandle(Request $request)
    {
        if (!$request->isPost()) abort(404, '页面不存在');
        $cateName = $request->post('catename');
        $catebelong = $request->post('catebelong', '', 'intval');
        $cateInfo = [
            'cate_name' => $cateName,
            'cate_time' => time(),
            'cate_belong' => $catebelong
        ];
        $cate = Cate::create($cateInfo)->id;
        if ($cate) {
            $this->success('添加分类成功!', 'admin/articleCate/addCate', '', 1);
        } else {
            $this->error('添加分类失败,请联系管理员!!!', 'admin/articleCate/addCate', '', 1);
        }
    }
    // 删除分类
    public function deleteHandle(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在!');
        $cateId = $request->post('id');
        $cate = Cate::destroy($cateId);
        if ($cate) {
            $response = [
                'errno' => 0
            ];
        } else {
            $response = [
                'errno' => '-1'
            ];
        }
        return json($response);
    }
    // 分类修改
    public function upDateCate($id, $catename)
    {
        $cateInfo = [
            'id' => $id,
            'catename' => $catename
        ];
        $this->assign('cateInfo', $cateInfo);
        return $this->fetch('cate/updatecate');
    }
    // 分类修改处理
    public function upDateCateHandle(Request $request)
    {
        if (!$request->isPost()) abort(404, '页面不存在!');
        $cateName = $request->post('catename');
        $cateId = $request->post('cateid', '', 'intval');
        $cate = Cate::where('id', $cateId)->update(['cate_name' => $cateName]);
        if ($cate) {
            $this->success('修改成功!', 'admin/articlecate/articleCate', '', 1);
        } else {
            $this->error('修改失败');
        }
    }
    // 分类排序
    public function upDateSortHandle(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在!');
        $cateId = $request->post('id', '', 'intval');
        $cateSort = $request->post('sort', '', 'intval');
        $cate = Cate::where('id', $cateId)->update(['cate_sort' => $cateSort]);
        if ($cate) {
            $response = [
                'errno' => 0
            ];
        } else {
            $response = [
                'errno' => '-1'
            ];
        }
        return json($response);
    }
}