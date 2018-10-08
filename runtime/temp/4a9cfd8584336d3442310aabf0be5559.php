<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"E:\www\zhangxxunblog\public/../application/admin\view\banner\bannerpre.html";i:1537885663;s:62:"E:\www\zhangxxunblog\application\admin\view\public\header.html";i:1537885663;}*/ ?>
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
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
        <legend><?php echo $bannerName; ?>(页面)轮播预览</legend>
    </fieldset>
    <div class="layui-carousel" id="bannerpre" style="margin:0 auto;">
        <div carousel-item="">
            <?php if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "该模块没有添加轮播" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div><a href="<?php echo $vo['banner_link']; ?>" target="_block"><img src="<?php echo $vo['banner_route']; ?>"></a></div>
            <?php endforeach; endif; else: echo "该模块没有添加轮播" ;endif; ?>
        </div>
    </div>

    <script>
        layui.use(['carousel', 'form'], function () {
            var carousel = layui.carousel
                , form = layui.form;
            //图片轮播
            carousel.render({
                elem: '#bannerpre'
                , width: '1170px'
                , height: '480px'
                , interval: 5000
            });
        });
    </script>

</body>

</html>