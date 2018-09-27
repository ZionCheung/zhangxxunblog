<?php

    namespace app\admin\controller;

    use app\admin\controller\Backstage as back;

    class Home extends back
    {
        // 后台信息
        public function home () {
            $serverInfo = [
                'versionNum' => 'v2.0',
                'serverAddr' => $_SERVER['SERVER_ADDR'].'/www.myzxx.cn',
                'serverTool' => 'PHP: Hypertext Preprocessor',
                'serverPhp' => PHP_VERSION,
                'serverOs' => PHP_OS,
                'serverEsce' => 'CentOS Linux 7.4.1708 (Core) /Apache2.4/Mysql5.6/php5.6',
                'serverFunc' => php_sapi_name(),
                'serverSqlTool' => 'Mysql',
                'serverMysql' => '5.6',
                'serverThink' => 'thinkPHP'.THINK_VERSION,
                'serverTime' => date_default_timezone_get(),
                'serverUpSize' => ini_get('upload_max_filesize'),
                'author' => '周维庆 Zion Cheung',
                'upTime' => '2018.08',
                'authorMeg' => '欢迎访问我的Blog后台,若有问题请联系939129894'
            ];
            $this ->assign('homeInfo',$serverInfo);
            return $this ->fetch('admin/home');
        }
    }