<?php

namespace app\common\model;

use think\Model;


class Banner extends Model
{
    // banner增加
    public static function addBanner($data)
    {
        if (empty($data)) return false;
        $bannerInfo = [
            'banner_route' => $data['imgRoute'],
            'banner_time' => time(),
            'banner_link' => $data['link'],
            'banner_desc' => $data['desc'],
            'cid' => $data['cate']
        ];
        $banner = new Banner;
        $result = $banner->validate(true)->save($bannerInfo);
        if ($result === false) {
            if (file_exists('.' . $banner['banner_route'])) {
                unlink('.' . $banner['banner_route']);
            }
            $response = [
                'errno' => -1,
                'errmge' => $banner->getError()
            ];
        } else {
            $response = [
                'errno' => 0,
                'errmge' => '添加成功'
            ];
        }
        return $response;
    }
    // banner 首页
    public static function getBerHomeAllPage($page = 1)
    {
        $berPage = self::where('cid', 'eq', 1)
            ->order('banner_sort', 'asc')
            ->paginate($page, false, ['query' => request()->param()]);
        $berData = $berPage->toArray();
        $berData['page'] = $berPage->render();
        return $berData;
    }
    // banner 心灵鸡汤
    public static function getBerHeartAllPage($page = 1)
    {
        $berPage = self::where('cid', 'eq', 3)
            ->order('banner_sort', 'asc')
            ->paginate($page, false, ['query' => request()->param()]);
        $berData = $berPage->toArray();
        $berData['page'] = $berPage->render();
        return $berData;
    }
    // banner 喧嚣生活
    public static function getBerLifeAllPage($page = 1)
    {
        $berPage = self::where('cid', 'eq', 4)
            ->order('banner_sort', 'asc')
            ->paginate($page, false, ['query' => request()->param()]);
        $berData = $berPage->toArray();
        $berData['page'] = $berPage->render();
        return $berData;
    }
    // banner 开关
    public static function setBerOnOff($data)
    {
        if (empty($data)) return false;
        $berId = intval($data);
        $berSign = intval(self::get($data)->banner_sign);
        switch ($berSign) {
            case 0:
                $newBer = 1;
                break;
            case 1:
                $newBer = 0;
                break;
        }
        $newBerSign = self::where('id', 'eq', $data)->update(['banner_sign' => $newBer]);
        if ($newBerSign) {
            $response = $newBer == 0 ? '已关闭' : '已开启';
        }
        return $response;
    }
    // banner 删除
    public static function deleteBerHandle($data)
    {
        if (empty($data)) return false;
        $berId = intval($data);
        $banner = self::destroy($data);
        if ($banner) return '删除成功!';
    }
    // banner 条件获取img路径
    public static function getWhereBer($data)
    {
        if (empty($data)) return false;
        $imgRoute = [];
        $banner = self::all($data);
        foreach ($banner as $v) {
            $imgRoute[] = $v['banner_route'];
        }
        return $imgRoute;
    }
    // banner 显示数据返回 
    public static function getViewBreAll($data)
    {
        if (empty($data)) return '没有数据!';
        $banner = self::where(['cid' => $data, 'banner_sign' => 1])
            ->order('banner_sort', 'asc')
            ->field('banner_route,banner_link')
            ->select();
        $bannerData = [];
        foreach ($banner as $v) {
            $bannerData[] = $v ->toArray();
        }
        return $bannerData;
    }
    // banner 获取修改数据
    public static function getUpdateBre ($data) {
        $banner = self::where('id','eq',$data) 
                        ->field('id,banner_route,banner_link,banner_desc')
                        ->find();
        if (empty($banner)) abort(404,'页面不存在!');
        $bannerData = $banner ->toArray();
        return $bannerData;
    }
    // banner 数据修改
    public static function setBerUpdate ($data){
        if (!is_array($data)) return false;
        $berData = $data['data'];
        $dataInfo = [
            'banner_link' => $berData['blink'],
            'banner_desc' => $berData['bdesc'],
        ];
        $bId = $berData['bid'];
        $banner = new Banner;
        $result = $banner ->validate('banner.update') ->save($dataInfo,['id'=>$bId]);
        if ($result === false){
            return $banner ->getError();
        }
        return '修改成功!';
    }
    // banner 排序修改
    public static function setBreSort ($data) {
        if (empty($data)) abort(404,'页面不存在!');
        $breSort = empty($data['sort']) ? 100 : $data['sort'];
        $berData = self::where('id','eq',$data['id']) ->update(['banner_sort' => $data['sort']]);
        return '更新成功!';
    }
}