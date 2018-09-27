<?php

    namespace app\admin\controller;

    use app\admin\controller\Backstage as back;
    
    class HeadUser extends back
    {
        // 修改头像页面
        public function headUser () {
            return $this ->fetch('admin/headuser');
        }
    }