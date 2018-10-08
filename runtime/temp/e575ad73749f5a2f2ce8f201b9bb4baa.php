<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"E:\www\zhangxxunblog\public/../application/admin\view\rule\updaterule.html";i:1537885663;s:62:"E:\www\zhangxxunblog\application\admin\view\public\header.html";i:1537885663;}*/ ?>
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
        <p style="color:#555;padding-bottom:28px;">修改须知:当需要修改权限名称/附加规则时,请将模块/控制器/方法其中的一个一起进行修改,以免因为字段唯一造成修改失败</p>
        <form class="layui-form" method="POST">
            <div class="layui-form-item">
                <label for="username" class="layui-form-label">
                    <span class="x-red">*</span>模块选择
                </label>
                <div class="layui-input-inline">
                    <select name="rmodel">
                        <option value="1" <?php if(($rule['model'] == 'admin')): ?> selected<?php else: endif; ?>>后端权限</option>
                        <option value="2" <?php if(($rule['model'] == 'index')): ?> selected<?php else: endif; ?>>前端权限</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>请选择你要添加的模块
                </div>
            </div>
            <div class="layui-form-item">
                <label for="rcontroller" class="layui-form-label">
                    <span class="x-red">*</span>控制器
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="rcontroller" name="rcontroller" required="" lay-verify="rcontroller" class="layui-input" value="<?php echo $rule['controller']; ?>">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>请输入新的控制器名称(不区分大小写)
                </div>
            </div>
            <div class="layui-form-item">
                <label for="raction" class="layui-form-label">
                    <span class="x-red">*</span>方法/操作
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="raction" name="raction" required="" lay-verify="raction" class="layui-input" value="<?php echo $rule['action']; ?>">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>请输入新的方法名称(不区分大小写)
                </div>
            </div>
            <div class="layui-form-item">
                <label for="rname" class="layui-form-label">
                    <span class="x-red">*</span>规则名称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="rname" name="rname" required="" lay-verify="rname" class="layui-input" value="<?php echo $rule['title']; ?>">
                    <input type="hidden" name="id" value="<?php echo $rule['id']; ?>">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>请输入新的规则名称(最好为中文简单易懂)
                </div>
            </div>
            <div class="layui-form-item">
                <label for="rcondition" class="layui-form-label">
                    <span class="x-red">*</span>附加规则
                </label>
                <div class="layui-input-inline">
                    <textarea name="rcondition" rows="10" lay-verify="rcondition" class="layui-textarea" style="resize:none;" placeholder="请输入新的附加规则(如果没有请保持为空)"><?php echo $rule['condition']; ?></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="" class="layui-form-label">
                </label>
                <button class="layui-btn layui-btn-radius" lay-submit="" lay-filter="add" type="button">
                    确认修改
                </button>
                <button type="reset" class="layui-btn layui-btn-primary layui-btn-radius">重置</button>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        layui.use(['form', 'layer'], function () {
            $ = layui.jquery;
            var form = layui.form
                , layer = layui.layer;

            //自定义验证规则
            form.verify({
                rcontroller: function (value) {
                    if (value.length == 0) {
                        return '控制器不能为空';
                    }
                },
                raction: function (value) {
                    if (value.length == 0) {
                        return '方法不能为空';
                    }
                },
                rname: function (value) {
                    if (value.length == 0) {
                        return '请填写规则名称';
                    }
                }
            });
            //监听提交
            form.on('submit(add)', function (data) {
                var ruleData = data.field;
                var rcon = ruleData.rcondition;
                if (rcon.length != 0) {
                    var con = confirm('你填写了附加规则,请确认!!!');
                    if (con == true) {
                        //发异步，把数据提交给php
                        $.post("<?php echo url('admin/rule/updateRuleHandle'); ?>", { 'ruleData': ruleData }, function success(response) {
                            if (response.errno == 0) {
                                layer.alert("修改成功", { icon: 6 }, function () {
                                    // 获得frame索引
                                    var index = parent.layer.getFrameIndex(window.name);
                                    //关闭当前frame
                                    parent.layer.close(index);
                                });
                            } else {
                                layer.alert(response.errno, { icon: 8 });
                            }
                        }, 'json');
                    } else {
                        return false;
                    }
                } else {
                    $.post("<?php echo url('admin/rule/updateRuleHandle'); ?>", { 'ruleData': ruleData }, function success(response) {
                        if (response.errno == 0) {
                            layer.alert("修改成功", { icon: 6 }, function () {
                                // 获得frame索引
                                var index = parent.layer.getFrameIndex(window.name);
                                //关闭当前frame
                                parent.layer.close(index);
                            });
                        } else {
                            layer.alert(response.errno, { icon: 8 });
                        }
                    }, 'json');
                }
            });
        });
    </script>
</body>

</html>