<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\WebCate as cateModel;
use lib\Catehandle;

class Currency extends Controller
{
    public function _initialize()
    {
        $cate = cateModel::getIndexCate();
        $this->assign('cate', $cate);
    }
}