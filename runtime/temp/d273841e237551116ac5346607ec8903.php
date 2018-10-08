<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"E:\www\zhangxxunblog\public/../application/admin\view\user\addaccess.html";i:1537885663;s:62:"E:\www\zhangxxunblog\application\admin\view\public\header.html";i:1537885663;}*/ ?>
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
    <div class="x-body">
        <form method="post" class="layui-form layui-form-pane">
            <div class="layui-form-item">
                <label for="title" class="layui-form-label">
                    <span class="x-red">*</span>管理员账号
                </label>
                <div class="layui-input-inline">
                    <input type="text" disabled="disabled" autocomplete="off" class="layui-input" value="<?php echo $roleData['uname']; ?>">
                    <input type="hidden" value="<?php echo $roleData['id']; ?>" id="uid">
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">
                    拥有权限
                </label>
                <table class="layui-table layui-input-block">
                    <tbody>
                        <?php if(is_array($roleData['role']) || $roleData['role'] instanceof \think\Collection || $roleData['role'] instanceof \think\Paginator): $i = 0; $__LIST__ = $roleData['role'];if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td style="min-width:110px;">
                                <input name="rid" lay-skin="primary" type="checkbox" value="<?php echo $vo['id']; ?>" title="<?php echo $vo['title']; ?>"
                                    <?php if(in_array($vo['id'],$access)): ?> checked="checked" <?php else: endif; ?>> </td> </tr>
                                    <?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?> </tbody> </table> </div> <div class="layui-form-item">
                                <button class="layui-btn" lay-submit="" lay-filter="add">增加</button>
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
            });

            //监听提交
            form.on('submit(add)', function (data) {
                var uid = $('#uid').val();
                var dataInfo = new Array();
                $.each($('input:checked'), function (i) {
                    dataInfo[i] = $(this).val();
                });
                $.ajax({
                    type: 'POST',
                    url: "<?php echo url('admin/adminuser/addUserAccessHandle'); ?>",
                    data: { 'uid': uid, 'gid': dataInfo },
                    success: function (response) {
                        layer.alert(response, { icon: 7 }, function () {
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.layer.close(index);
                        });
                    },
                    dataType: 'json'
                });
                return false;
            });
        });
    </script>
</body>

</html>