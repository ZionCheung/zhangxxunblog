<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"E:\www\zhangxxunblog\public/../application/admin\view\article\articlepreview.html";i:1537885663;s:62:"E:\www\zhangxxunblog\application\admin\view\public\header.html";i:1537885663;}*/ ?>
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
    <div class="x-nav">
        <span class="layui-breadcrumb">
            <cite>文章预览</cite>
        </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);"
            title="刷新">
            <i class="fa fa-refresh" style="line-height:30px; display: block; padding-top: 4px"></i>
        </a>
    </div>
    <article>
        <div class="imgbox">
            <img src="/static/upload/article/original/<?php echo $article['article_cover']; ?>" alt="文章封面图" title="文章封面图">
        </div>
        <div class="pretitle">
            <h1>本文标题:<?php echo $article['article_name']; ?></h1>
        </div>
        <div class="author" style="text-align:center; color:rgb(63, 61, 61);">
            <h3>本文作者:<?php echo $article['article_author']; ?></h3>
        </div>
        <div class="content">
            <?php echo $article['article_content']; ?>
        </div>
    </article>
</body>

</html>