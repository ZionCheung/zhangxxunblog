<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"E:\www\zhangxxunblog\public/../application/admin\view\user\updateuser.html";i:1538977924;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>zhangxxun</title>
    <meta name="renderer" content="webkit">
    <link rel="stylesheet" href="/static/admin/css/font.css">
    <link rel="stylesheet" href="/static/admin/css/xadmin.css">
    <link rel="stylesheet" href="/static/admin/css/adminpub.css">
    <link rel="stylesheet" href="/static/css/font-awesome.min.css">
    <link rel="stylesheet" href="/static/admin/css/head.css" />
    <link rel="stylesheet" href="/static/admin/css/cropper.min.css" />
    <link href="/static/css/bootstrap.min.css" rel="stylesheet">
    <script src="/static/js/jquery-3.3.1.min.js"></script>
    <script src="/static/admin/js/cropper.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
    <script src="/static/admin/js/head.js"></script>
    <script type="text/javascript" src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
    <script type="text/javascript">
        var imgAjaxUrl = "<?php echo url('admin/adminuser/updateHeadHandle'); ?>";
        var imgRoule = "/static/upload/admin/heads/";
    </script>
</head>

<body>
    <!-- 头像上传 -->
    <div class="user-photo-box">
        <a class="userbtn" data-target="#changeModal" data-toggle="modal">
            <span class="imgicon"><i class="fa fa-camera"></i></span>
            <?php if(strlen($userData['ad_headimg'])>11): ?>
            <img src="" alt="" class="user-photo">
            <?php else: ?>
            <img src="/static/upload/admin/heads/<?php echo $userData['ad_headimg']; ?>" alt="" class="user-photo">
            <?php endif; ?>
        </a>
        <span class="head-title">修改头像</span>
    </div>
    <div class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-primary">
                        <i class="fa fa-pencil"></i>
                        更换头像
                    </h4>
                </div>
                <div class="modal-body">
                    <p class="tip-info text-center">
                        未选择图片
                    </p>
                    <div class="img-container hidden">
                        <img src="" alt="" id="photo">
                    </div>
                    <div class="img-preview-box hidden">
                        <hr>
                        <span>方框头像</span>
                        <div class="img-preview img-preview-md">
                        </div>
                        <span>圆形头像</span>
                        <div class="img-preview img-preview-r">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <label class="btn btn-danger pull-left" for="photoInput">
                        <input type="file" class="sr-only" id="photoInput" accept="image/*">
                        <span>选择图片</span>
                    </label>
                    <button class="btn btn-primary disabled" disabled="true" onclick="sendPhoto();">提交</button>
                    <button class="btn btn-close" aria-hidden="true" data-dismiss="modal">取消</button>
                </div>
            </div>
        </div>
    </div>
    <div class="x-body" style="display:flex;justify-content:center;">
        <form class="layui-form">
            <div class="layui-form-item">
                <label for="username" class="layui-form-label">
                    <span class="x-red">*</span>当前用户名
                </label>
                <div class="layui-input-inline">
                    <input type="text" value="<?php echo $userData['ad_username']; ?>" required="" autocomplete="off" class="layui-input"
                        disabled="disabled">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>唯一用户名,不可修改
                </div>
            </div>
            <div class="layui-form-item">
                <label for="name" class="layui-form-label">
                    <span class="x-red">*</span>昵称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="name" name="name" value="<?php echo $userData['ad_name']; ?>" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>请输入新的昵称(如不需要修改保持原样则可)
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">
                    <span class="x-red">*</span>密码
                </label>
                <div class="layui-input-inline">
                    <input type="password" id="L_pass" name="password" required="" lay-verify="pass" autocomplete="off"
                        class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    如果不需要修改密码请不要填写
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                    <span class="x-red">*</span>确认密码
                </label>
                <div class="layui-input-inline">
                    <input type="password" id="L_repass" name="repass" required="" lay-verify="repass" autocomplete="off"
                        class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="" type="submit">
                    确认修改
                </button>
            </div>
        </form>
    </div>
    <script>
        layui.use(['form', 'layer'], function () {
            $ = layui.jquery;
            var form = layui.form
                , layer = layui.layer;

            //自定义验证规则
            form.verify({
                repass: function (value) {
                    if ($('#L_pass').val() != $('#L_repass').val()) {
                        return '两次密码不一致';
                    }
                }
            });

            //监听提交
            form.on('submit(add)', function (data) {
                var name = data.field.name;
                var password = data.field.password;
                var imgRoute = $('.user-photo').attr('src');
                $.ajax({
                    type: 'POST',
                    url: "<?php echo url('admin/adminuser/updateUserHandle'); ?>",
                    data: { 'name': name, 'password': password, 'imgRoute': imgRoute },
                    success: function (response) {
                        layer.alert(response, { icon: 7 }, function () {
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.layer.close(index);
                        });
                    },
                    dataType: "json"
                });
                return false;
            });
        });
    </script>
</body>

</html>