<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"E:\www\zhangxxunblog\public/../application/admin\view\article\updatearticle.html";i:1537885663;}*/ ?>
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
    <script type="text/javascript" src="/static/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
    <link href="/static/umeditor/themes/default/css/umeditor.min.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" charset="utf-8" src="/static/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/static/umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="/static/umeditor/lang/zh-cn/zh-cn.js"></script>
</head>

<body>
    <div class="x-nav">
        <span class="layui-breadcrumb">
            <cite>文章内容修改</cite>
        </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);"
            title="刷新">
            <i class="fa fa-refresh" style="line-height:30px; display: block; padding-top: 4px"></i>
        </a>
    </div>
    <blockquote class="layui-elem-quote layui-text">
        添加文章须知:文章封面/配图不得大于2M
    </blockquote>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>文章封面图</legend>
    </fieldset>
    <div class="banner-box">
        <div class="layui-upload-list article-img" style="display:block">
            <img class="layui-upload-img" src="/static/upload/article/original/<?php echo $article['article_cover']; ?>" id="imgpre">
            <p id="demoText"></p>
        </div>
        <div class="layui-upload-drag" id="uploadimg">
            <i class="layui-icon"></i>
            <p>点击或将文章封面图拖拽于本区域,若对图片不满意继续添加即可覆盖</p>
        </div>
    </div>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>文章信息</legend>
    </fieldset>
    <form class="layui-form">
        <div class="layui-form-item" style="display:flex;justify-content:center;">
            <label class="layui-form-label">文章名称</label>
            <div class="layui-input-inline" style="width:480px;">
                <input type="text" name="aclename" lay-verify="required" placeholder="请输入文章名称" autocomplete="off" class="layui-input"
                    onblur="artcileUnique($(this).val())" value="<?php echo $article['article_name']; ?>">
                <input type="hidden" value="<?php echo $article['id']; ?>" name="aid">
                <input type="hidden" value="<?php echo $article['article_serial']; ?>" name="serial">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span><span id="name-tips">输入文章标题</span>
            </div>
        </div>
        <div class="layui-form-item" style="display:flex;justify-content:center;">
            <label class="layui-form-label">文章作者</label>
            <div class="layui-input-inline" style="width:480px;">
                <input type="text" name="acleauthor" lay-verify="required" value="<?php echo $article['article_author']; ?>"
                    autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span><span id="name-tips">输入文章作者</span>
            </div>
        </div>
        <div class="layui-form-item" style="display:flex;justify-content:center;">
            <label class="layui-form-label">所属分类</label>
            <div class="layui-input-inline" style="width:480px;">
                <select name="acate" id="acate">
                    <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "分类为空" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $cate['id']; ?>" <?php if($article['cid']==$cate['id']): ?>selected <?php endif; ?>><?php echo $cate['cate_name']; ?>
                        </option> <?php endforeach; endif; else: echo "分类为空" ;endif; ?> </select> </div> <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>选择文章分类
            </div>
        </div>
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>文章标签</legend>
        </fieldset>
        <div class="layui-form-item" style="display:flex;justify-content:center;">
            <label class="layui-form-label"></label>
            <div class="layui-input-block" style="margin:0;padding:0 38px;">
                <?php if(is_array($tags) || $tags instanceof \think\Collection || $tags instanceof \think\Paginator): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "暂时没有标签哦" ;else: foreach($__LIST__ as $key=>$tags): $mod = ($i % 2 );++$i;?>
                <input type="checkbox" name="tags" title="<?php echo $tags['tags_title']; ?>" value="<?php echo $tags['id']; ?>" <?php if(in_array($tags['id'],$article['label'])): ?>checked="checked" <?php endif; ?>> <?php endforeach; endif; else: echo "暂时没有标签哦" ;endif; ?> </div> </div> <fieldset class="layui-elem-field layui-field-title"
                    style="margin-top: 20px;">
                <legend>文章正文</legend>
                </fieldset>
                <!-- Editor -->
                <div class="layui-form-item">
                    <div class="layui-input-block" style="margin:0;padding:0 38px;">
                        <textarea name="content" id="articleEditor" lay-verify="required" style="width:100%;"><?php echo $article['article_content']; ?></textarea>
                    </div>
                </div>
                <div class="layui-form-item" style="display:flex;justify-content:center; margin-bottom: 38px;">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="add">确认修改</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
    </form>
    <!-- editor -->
    <script type="text/javascript">
        $(function () {
            window.UMEDITOR_HOME_URL = "/static/umeditor";
            var um = UM.getEditor('articleEditor', {
                toolbar: [
                    'source | undo redo | bold italic underline strikethrough | superscript subscript | forecolor backcolor | removeformat |',
                    'insertorderedlist insertunorderedlist | selectall cleardoc paragraph | fontfamily fontsize',
                    '| justifyleft justifycenter justifyright justifyjustify |',
                    'link unlink | emotion image video',
                    '| horizontal preview fullscreen', 'drafts'
                ]
                , autoHeightEnabled: false
                , zIndex: 800
            });
        })
    </script>
    <!-- 封面图片上传 -->
    <script>
        layui.use(['upload', 'form'], function () {
            var $ = layui.jquery
                , upload = layui.upload;
            var form = layui.form;
            //图片上传
            var uploadInst = upload.render({
                elem: '#uploadimg'
                , url: "<?php echo url('admin/article/articleCoverMapHandle'); ?>"
                , data: {
                    imgRoute: function () {
                        return $('#imgpre').attr('src');
                    }
                }
                , accept: 'images' //普通文件
                , exts: 'jpg|jpeg|png' //上传文件后缀名
                , done: function (response) {
                    if (response.errno == 0) {
                        $('#imgpre').attr('src', '/static/upload/article/original/' + response.imgName);
                    }
                }
                , error: function () {
                    //演示失败状态，并实现重传
                    var demoText = $('#uploadimg');
                    demoText.html('<span style="color: #FF5722;">上传失败图片可能太大</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                    demoText.find('.demo-reload').on('click', function () {
                        uploadInst.upload();
                    });
                }
            });
            form.on('submit(add)', function (data) {
                var dataInfo = new Array;
                $.each($('input[type=checkbox]:checked'), function (i) {
                    dataInfo[i] = $(this).val();
                });
                var id = data.field.aid;
                var serial = data.field.serial;
                var tags = dataInfo.join(',');
                var name = data.field.aclename;
                var author = data.field.acleauthor;
                var content = data.field.content;
                var cate = data.field.acate;
                var imgRoute = $('#imgpre').attr('src');
                $.ajax({
                    type: 'post'
                    , url: "<?php echo url('admin/article/articleUpDateHandle'); ?>"
                    , data: { 'id': id, 'serial': serial, 'tags': tags, 'name': name, 'author': author, 'content': content, 'cate': cate, 'imgRoute': imgRoute }
                    , dataType: 'json'
                    , success: function (response) {
                        if (response.errno == 0) {
                            layer.alert(response.mge, { icon: 6 }, function () {
                                var index = parent.layer.getFrameIndex(window.name);
                                parent.layer.close(index);
                            });
                        } else {
                            layer.msg(response, { icon: 7, time: 1000 });
                        }
                    }
                });
                return false;
            });
        });
    </script>
    <script>
        function artcileUnique(val) {
            var articleName = val;
            if (articleName.length != 0) {
                $.ajax({
                    type: 'post'
                    , url: "<?php echo url('admin/article/articleNameValidation'); ?>"
                    , data: { 'name': articleName }
                    , dataType: 'json'
                    , success: function (response) {
                        if (response.errno == 0) {
                            $('#name-tips').html('<i class="fa fa-check-circle" style="color:#009900;">' + response.mge + '</i>');
                        } else {
                            $('#name-tips').html('<i class="fa fa-times-circle" style="color:#f52f02">' + response + '</i>');
                        }
                    }
                });
            }
        }
    </script>
</body>

</html>