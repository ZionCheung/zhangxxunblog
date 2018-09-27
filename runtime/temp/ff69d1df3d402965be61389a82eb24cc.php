<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"E:\www\zhangxxunblog\public/../application/admin\view\banner\addbanner.html";i:1537885663;s:62:"E:\www\zhangxxunblog\application\admin\view\public\header.html";i:1537885663;}*/ ?>
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
            <cite>banner内容添加</cite>
        </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);"
            title="刷新">
            <i class="fa fa-refresh" style="line-height:30px; display: block; padding-top: 4px"></i>
        </a>
    </div>
    <div class="banner-box">
        <div class="layui-upload-list banner-img">
            <img class="layui-upload-img" src="" id="imgpre">
            <p id="demoText"></p>
        </div>
        <div class="layui-upload-drag" id="uploadimg">
            <i class="layui-icon"></i>
            <p>点击或将图片拖拽于本区域(仅支持jpg/jpeg)图片格式,若对图片不满意继续添加即可覆盖</p>
        </div>
    </div>
    <div class="x-body" style="display:flex;justify-content:center;">
        <div class="layui-form">
            <div class="layui-form-item">
                <label for="blink" class="layui-form-label">
                    <span class="x-red">*</span>banner链接
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="blink" name="blink" required="" lay-verify="required" autocomplete="off"
                        class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>请输入banner链接
                </div>
            </div>
            <div class="layui-form-item">
                <label for="bcate" class="layui-form-label">
                    <span class="x-red">*</span>所属分类
                </label>
                <div class="layui-input-inline">
                    <select name="bcate" id="bcate">
                        <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "数据暂时为空" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['id']; ?>"><?php echo $vo['cate_name']; ?></option>
                        <?php endforeach; endif; else: echo "数据暂时为空" ;endif; ?>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>请选择banner所属分类
                </div>
            </div>
            <div class="layui-form-item">
                <label for="bwater" class="layui-form-label">
                    <span class="x-red">*</span>添加水印
                </label>
                <div class="layui-input-inline">
                    <input type="radio" id="bwater" value="1" name="bwater" title="是">
                    <input type="radio" id="bwater" value="0" name="bwater" title="否" checked="checked">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>请选择是否添加水印标识
                </div>
            </div>
            <div class="layui-form-item">
                <label for="username" class="layui-form-label">
                    <span class="x-red">*</span>banner描述
                </label>
                <div class="layui-input-inline">
                    <textarea name="bdesc" id="bdesc" rows="10" class="layui-textarea" placeholder="请输入banner描述(20字左右)"
                        style="resize:none"></textarea>
                </div>
            </div>
            <div class="layui-form-item" style="text-align:center;">
                <button class="layui-btn" onclick="bannerBtnSub()">
                    确认添加
                </button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        layui.use('upload', function () {
            var $ = layui.jquery
                , upload = layui.upload;

            //图片上传
            var uploadInst = upload.render({
                elem: '#uploadimg'
                , url: "<?php echo url('admin/banner/addBannerImgHandle'); ?>"
                , data: {
                    imgRoute: function () {
                        return $('#imgpre').attr('src');
                    }
                }
                , accept: 'images' //普通文件
                , exts: 'jpg|jpeg' //上传文件后缀名
                , done: function (response) {
                    if (response.errno == 0) {
                        $('.banner-img').fadeIn(500);
                        $('#imgpre').attr('src', "/static/upload/banner/" + response.imgName);
                    }
                }
                , error: function () {
                    //演示失败状态，并实现重传
                    var demoText = $('#uploadimg');
                    demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                    demoText.find('.demo-reload').on('click', function () {
                        uploadInst.upload();
                    });
                }
            });
        });
        $(function () {
            $(window).on('beforeunload', function () {
                var imgRoute = $('#imgpre').attr('src');
                if (imgRoute.length != 0) {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo url('admin/banner/bannerImg'); ?>",
                        data: { 'imgRoute': imgRoute },
                        success: function (response) {
                        },
                        dataType: 'json'
                    });
                }
            });
        });
        function bannerBtnSub() {
            var data = [];
            data['bLink'] = $('#blink').val();
            data['bCate'] = $('#bcate').val();
            data['imgRoute'] = $('#imgpre').attr('src');
            data['bWater'] = $("input[name='bwater']:checked").val();
            data['bDesc'] = $('#bdesc').val();
            if (data['bLink'].length == 0 || data['imgRoute'].length == 0) {
                layer.msg('banner图片/链接不能为空');
                return false;
            }
            $.ajax({
                type: "POST",
                url: "<?php echo url('admin/banner/addBannerHandle'); ?>",
                data: {
                    'link': data['bLink'],
                    'cate': data['bCate'],
                    'imgRoute': data['imgRoute'],
                    'water': data['bWater'],
                    'desc': data['bDesc']
                },
                success: function (response) {
                    if (response.errno == 0) {
                        $('#imgpre').attr('src', '');
                        layer.msg(response.errmge, { icon: 7, time: 500 },function(){
                            window.location.reload();
                        });
                    } else {
                        layer.msg(response.mge, { icon: 7, time: 500 });
                    }
                },
                dataType: 'json'
            });
        }
    </script>

</body>

</html>