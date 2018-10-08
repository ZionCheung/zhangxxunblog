<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"E:\www\zhangxxunblog\public/../application/admin\view\admin\index.html";i:1538968185;s:62:"E:\www\zhangxxunblog\application\admin\view\public\header.html";i:1537885663;}*/ ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>zhangxxun</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="stylesheet" href="/static/admin/css/font.css">
  <link rel="stylesheet" href="/static/admin/css/xadmin.css">
  <link rel="stylesheet" href="/static/admin/css/adminpub.css">
  <link rel="stylesheet" href="/static/css/font-awesome.min.css">
  <link rel="stylesheet" href="/static/css/zoomify.css">
  <script type="text/javascript" src="/static/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
  <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
  <script type="text/javascript" src="/static/js/zoomify.js"></script>
</head>

<body>
    <!-- 顶部开始 -->
    <div class="container">
        <div class="logo"><a href="<?php echo url('admin/index/index'); ?>">
                <img src="/static/images/aboutmelogo2.png" alt=""></a>
        </div>
        <div class="left_open">
            <i title="展开左侧栏" class="iconfont">&#xe699;</i>
        </div>
        <ul class="layui-nav left fast-add" lay-filter=""">
            <li class=" layui-nav-item">
            <a href="javascript:;">快捷添加</a>
            <dl class="layui-nav-child">
                <!-- 二级菜单 -->
                <dd><a onclick="x_admin_show('文章添加','<?php echo url('admin/article/addarticle'); ?>')"><i class="iconfont">&#xe6a2;</i>文章添加</a></dd>
                <dd><a onclick="x_admin_show('banner添加','<?php echo url('admin/banner/addBanner'); ?>')"><i class="iconfont">&#xe6a8;</i>轮播添加</a></dd>
                <dd><a onclick="x_admin_show('用户添加','<?php echo url('admin/adminuser/addAdminUser'); ?>')"><i class="iconfont">&#xe6b8;</i>用户添加</a></dd>
            </dl>
            </li>
        </ul>
        <ul class="layui-nav right" lay-filter="">
            <li class="head-user">
                <?php if(strlen($user['ad_headimg'])>11): ?>
                <img src="<?php echo $user['ad_headimg']; ?>" alt="">
                <?php else: ?>
                <img src="/static/upload/admin/heads/<?php echo $user['ad_headimg']; ?>" alt="">
                <?php endif; ?>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;"><?php echo $user['ad_name']; ?></a>
                <dl class="layui-nav-child">
                    <!-- 二级菜单 -->
                    <dd><a onclick="x_admin_show('个人信息','<?php echo url('admin/Adminuser/updateUser',['uid' => $userId]); ?>')">个人信息</a></dd>
                    <dd><a onclick="x_admin_show('切换帐号','<?php echo url('admin/login/login'); ?>')">切换帐号</a></dd>
                    <dd><a href="<?php echo url('admin/index/loginout'); ?>">退出</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item to-index"><a target="_block" href="<?php echo url('index/index/index'); ?>">前台首页</a></li>
        </ul>

    </div>
    <!-- 顶部结束 -->
    <!-- 中部开始 -->
    <!-- 左侧菜单开始 -->
    <div class="left-nav">
        <div class="nav-time">
        </div>
        <div id="side-nav">
            <ul id="nav">
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-user-circle"></i>
                        <cite>管理员</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a _href="<?php echo url('admin/adminuser/adminuser'); ?>" style="padding-left:3em;">
                                <i class="fa fa-group"></i>
                                <cite>管理员列表</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="<?php echo url('admin/adminuser/adAccess'); ?>" style="padding-left:3em;">
                                <i class="fa fa-universal-access"></i>
                                <cite>管理员权限</cite>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-photo"></i>
                        <cite>banner/轮播图</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a _href="<?php echo url('admin/banner/banner'); ?>" style="padding-left:3em;">
                                <i class="fa fa-photo"></i>
                                <cite>banner列表</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="<?php echo url('admin/banner/addbanner'); ?>" style="padding-left:3em;">
                                <i class="fa fa-cloud-upload"></i>
                                <cite>banner添加</cite>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="iconfont">&#xe74e;</i>
                        <cite>文章管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a _href="<?php echo url('admin/article/addarticle'); ?>" style="padding-left:3em;">
                                <i class="fa fa-plus"></i>
                                <cite>文章添加</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="<?php echo url('admin/article/article'); ?>" style="padding-left:3em;">
                                <i class="fa fa-list-alt"></i>
                                <cite>文章列表</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="<?php echo url('admin/article/articleRecycleBinList'); ?>" style="padding-left:3em;">
                                <i class="fa fa-recycle"></i>
                                <cite>回收站</cite>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <cite>分类/标签</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a _href="<?php echo url('admin/Webcate/cate'); ?>" style="padding-left:3em;">
                                <i class="fa fa-tags"></i>
                                <cite>分类管理</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="<?php echo url('admin/tags/tags'); ?>" style="padding-left:3em;">
                                <i class="fa fa-bookmark"></i>
                                <cite>标签管理</cite>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-unlock-alt"></i>
                        <cite>权限管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a _href="<?php echo url('admin/rule/rule'); ?>" style="padding-left:3em;">
                                <i class="fa fa-minus-square-o"></i>
                                <cite>规则管理</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="<?php echo url('admin/role/role'); ?>" style="padding-left:3em;">
                                <i class="fa fa-users"></i>
                                <cite>权限组管理</cite>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- 左侧菜单结束 -->
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
            <ul class="layui-tab-title">
                <li class="home layui-this"><i class="layui-icon">&#xe68e;</i>我的桌面</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <iframe src="<?php echo url('admin/home/home'); ?>" frameborder="0" scrolling="yes" class="x-iframe"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content-bg"></div>
    <!-- 右侧主体结束 -->
    <!-- 中部结束 -->
    <!-- 底部开始 -->
    <div class="footer">
        <div class="copyright">welcome to zhangxxun_v2.0</div>
    </div>
    <!-- 底部结束 -->
</body>

</html>