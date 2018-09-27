<?php

namespace app\admin\controller;

use app\admin\controller\Backstage as back;
use app\admin\model\WebCate as cate;
use app\common\model\Banner as bannerModel;
use think\Request;
use think\Image as imageUp;

class Banner extends back
{
    // banner 列表
    public function banner()
    {
        $berHomeData = bannerModel::getBerHomeAllPage(10);
        $berHeartData = bannerModel::getBerHeartAllPage(10);
        $berLifeData = bannerModel::getBerLifeAllPage(10);
        $this->assign('berHome', $berHomeData);
        $this->assign('berHeart', $berHeartData);
        $this->assign('berLife', $berLifeData);
        return $this->fetch('banner/banner');
    }
    // banner 添加
    public function addBanner()
    {
        $banerCate = cate::getTopCate();
        $this->assign('cate', $banerCate);
        return $this->fetch('banner/addbanner');
    }
    // banner 上传图片处理
    public function addBannerImgHandle(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $image = $request->file('file');
        $img = $request->post('imgRoute');
        if (!empty($img)) {
            $oldImgRoute = '.' . $img;
            if (file_exists($oldImgRoute)) {
                unlink($oldImgRoute);
            }
        }
        $imgRoute = '.' . DS . 'static' . DS . 'upload' . DS . 'banner' . DS;
        $info = $image->rule('uniqid')->move($imgRoute);
        if ($info) {
            $imgName = $imgRoute . $info->getSaveName();
            $imgages = imageUp::open($imgName);
            $imgages->thumb(1170, 480, \think\Image::THUMB_CENTER)->save($imgName);
            $response = [
                'route' => $imgName,
                'imgName' => $info->getSaveName(),
                'errno' => 0
            ];
            return json($response);
        } else {
            return $file->getError();
        }
    }
    // banner 预览图片处理
    public function bannerImg(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $imgRoute = $request->post('imgRoute');
        $oldImgRoute = '.' . $imgRoute;
        if (file_exists($oldImgRoute)) {
            unlink($oldImgRoute);
        }
    }
    // banner 添加内容处理
    public function addBannerHandle(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $bannerData = $request->post();
        $bannerImgRoute = '.' . $bannerData['imgRoute'];
        $bannerWaterSign = intval($bannerData['water']);
        $bannerCate = intval($bannerData['cate']);
        $waterImg = '.' . DS . 'static' . DS . 'images' . DS . 'water.png';
        if ($bannerCate === 1) {
            $bannerImgs = imageUp::open($bannerImgRoute);
            $bannerImgs->thumb(750, 420, \think\Image::THUMB_CENTER)->save($bannerImgRoute);
        }
        if ($bannerWaterSign === 1) {
            $imgages = imageUp::open($bannerImgRoute);
            $imgages->water($waterImg, \think\Image::WATER_CENTER, 30)->save($bannerImgRoute);
        }
        unset($bannerData['water']);
        $banenrInfo = bannerModel::addBanner($bannerData);
        return json($banenrInfo);
    }
    // banner 开关
    public function bannerOnOff(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $bId = $request->post('id');
        $banner = bannerModel::setBerOnOff($bId);
        return json($banner);
    }
    // banner 删除
    public function deleteBanner(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在');
        $bId = $request->post('id');
        $bImgRoute = $request->post('imgRoute');
        $newImgRoute = '.' . $bImgRoute;
        $bannerInfo = bannerModel::getWhereBer($bId);
        $banner = bannerModel::deleteBerHandle($bId);
        if (!empty($bImgRoute)) {
            if (file_exists($newImgRoute)) {
                unlink($newImgRoute);
            }
        } else {
            foreach ($bannerInfo as $v) {
                $vRoute = '.' . $v;
                if (file_exists($vRoute)) {
                    unlink($vRoute);
                }
            }
        }
        return json($banner);
    }
    // banner 预览
    public function bannerPreview($cid)
    {
        $bannerData = bannerModel::getViewBreAll($cid);
        $bannerCate = cate::getCateName($cid);
        $this->assign('bannerName', $bannerCate);
        $this->assign('banner', $bannerData);
        return $this->fetch('banner/bannerpre');
    }
    // banner 编辑 
    public function bannerUpdate($id)
    {
        $bannerData = bannerModel::getUpdateBre($id);
        $this->assign('bre', $bannerData);
        return $this->fetch('banner/updateber');
    }
    // banner 编辑处理
    public function bannerUpdateHandle(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在!');
        $breData = $request->post();
        $breInfo = bannerModel::setBerUpdate($breData);
        return json($breInfo);
    }
    // banner排序修改
    public function bannerOrderUpdate(Request $request)
    {
        if (!$request->isAjax()) abort(404, '页面不存在!');
        $breData = $request->post();
        $breInfo = bannerModel::setBreSort($breData);
        return json($breInfo);
    }
}