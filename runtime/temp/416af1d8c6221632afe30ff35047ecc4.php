<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"E:\www\zhangxxunblog\public/../application/admin\view\rule\updaterole.html";i:1537885663;s:62:"E:\www\zhangxxunblog\application\admin\view\public\header.html";i:1537885663;}*/ ?>
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
                <label class="layui-form-label" style="width: 200px;">
                    <span class="x-red">*</span>当前角色名(不可更改)
                </label>
                <div class="layui-input-inline">
                    <input type="text" value="<?php echo $role['title']; ?>" disabled="disabled" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    <input type="hidden" value="<?php echo $role['id']; ?>" name="roleId">
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">
                    拥有权限(请至少选择一样权限)
                </label>
                <table class="layui-table layui-input-block">
                    <tbody>
                        <?php if(is_array($rule) || $rule instanceof \think\Collection || $rule instanceof \think\Paginator): $i = 0; $__LIST__ = $rule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td style="min-width:110px;">
                                <input name="id" lay-skin="primary" type="checkbox" <?php if(in_array($vo['id'],$role['rules'])): ?> checked="checked" <?php else: endif; ?> value="<?php echo $vo['id']; ?>" title="<?php echo $vo['title']; ?>">
                            </td>
                            <td>
                                <div class="layui-input-block">
                                    <?php if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                    <input name="id" lay-skin="primary" type="checkbox" <?php if(in_array($v['id'],$role['rules'])): ?> checked="checked" <?php else: endif; ?> value="<?php echo $v['id']; ?>" title="<?php echo $v['title']; ?>">
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="layui-form-item layui-form-text">
                <label for="desc" class="layui-form-label">
                    描述
                </label>
                <div class="layui-input-block">
                    <textarea placeholder="请输入内容" id="desc" name="desc" lay-verify="required" class="layui-textarea"><?php echo $role['describe']; ?></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" lay-filter="add">确认修改</button>
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
                var dataInfo = new Array();
                $.each($('input:checked'), function (i) {
                    dataInfo[i] = $(this).val();
                })
                var title = data.field.title;
                var desc = data.field.desc;
                var id = data.field.roleId;

                $.post("<?php echo url('admin/role/updateRoleHandle'); ?>", { 'id': id, 'data': dataInfo, 'desc': desc }, function success(response) {
                    layer.alert(response, { icon: 7 }, function () {
                        var index = parent.layer.getFrameIndex(window.name);
                        parent.layer.close(index);
                    });
                }, 'json');
                return false;
            });


        });
    </script>
</body>

</html>