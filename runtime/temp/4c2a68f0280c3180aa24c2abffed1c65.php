<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"E:\www\zhangxxunblog\public/../application/admin\view\rule\rule.html";i:1537885663;s:62:"E:\www\zhangxxunblog\application\admin\view\public\header.html";i:1537885663;}*/ ?>
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
      <a>
        <cite>添加权限规则</cite></a>
    </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);"
      title="刷新">
      <i class="layui-icon" style="line-height:30px; display: block; padding-top: 4px">ဂ</i></a>
  </div>
  <div class="x-body">
    <div class="layui-row">
      <form class="layui-form layui-col-md12 x-so layui-form-pane" method="get" action="<?php echo url('admin/rule/rule'); ?>">
        <input class="layui-input" placeholder="权限名/控制器名称/方法名" name="key" style="width:220px; vertical-align: middle;">
        <button class="layui-btn" lay-submit="" lay-filter="sreach" type="submit"><i></i>查找</button>
      </form>
    </div>
    <xblock>
      <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
      <button class="layui-btn" lay-submit="" onclick="x_admin_show('添加规则','<?php echo url('admin/rule/addrule'); ?>')"><i class="layui-icon"></i>增加</button>
      <span class="x-right" style="line-height:40px">共有数据：<?php echo $ruleInfo['total']; ?> 条</span>
    </xblock>
    <table class="layui-table">
      <thead>
        <tr>
          <th>
            <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
          </th>
          <th>ID</th>
          <th>权限规则</th>
          <th>权限名称</th>
          <th>权限开关</th>
          <th>操作</th>
      </thead>
      <tbody>
        <?php if(is_array($ruleInfo['data']) || $ruleInfo['data'] instanceof \think\Collection || $ruleInfo['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $ruleInfo['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
          <td>
            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $vo['id']; ?>'><i class="layui-icon">&#xe605;</i></div>
          </td>
          <td><?php echo $i; ?></td>
          <td><?php echo $vo['name']; ?></td>
          <td><?php echo $vo['title']; ?></td>
          <td>
            <input type="radio" name="rstatus_<?php echo $i; ?>" value="1" <?php if(($vo['status'] == 1)): ?> checked<?php else: endif; ?> onclick="updateStatus($(this).val(),<?php echo $vo['id']; ?>)">已开启
            <input type="radio" name="rstatus_<?php echo $i; ?>" value="0" <?php if(($vo['status'] == 0)): ?> checked<?php else: endif; ?> onclick="updateStatus($(this).val(),<?php echo $vo['id']; ?>)">已关闭
          </td>
          <td class="td-manage">
            <a title="编辑" onclick="x_admin_show('规则编辑','<?php echo url('admin/rule/updateRule',['id'=>$vo['id']]); ?>')" href="javascript:;">
              <i class="layui-icon" style="color:#009900">&#xe642;</i><span style="color:#009900">编辑</span>
            </a>
            <a title="删除" onclick="member_del(this,<?php echo $vo['id']; ?>)" href="javascript:;">
              <i class="layui-icon" style="color:#ff6804">&#xe640;</i><span style="color:#ff6804">删除</span>
            </a>
          </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
    </table>
    <div class="page">
      <div>
        <?php echo $ruleInfo['page']; ?>
      </div>
    </div>

  </div>
  <script type="text/javascript">
    layui.use('laydate', function () {
      var laydate = layui.laydate;

      //执行一个laydate实例
      laydate.render({
        elem: '#start' //指定元素
      });

      //执行一个laydate实例
      laydate.render({
        elem: '#end' //指定元素
      });
    });

    /*-删除单个*/
    function member_del(obj, id) {
      layer.confirm('确认要删除吗？', function (index) {
        $.post("<?php echo url('admin/rule/deleterule'); ?>", { 'id': id }, function success(response) {
          if (response.errno == 0) {
            $(obj).parents("tr").remove();
            layer.msg('已删除!', { icon: 1, time: 1000 });
          } else {
            layer.msg('系统错误!', { icon: 8, time: 1000 });
          }
        }, 'json');
      });
    }
    /*删除-多个*/
    function delAll(argument) {
      var data = tableCheck.getData();
      var id = data.join(",");
      layer.confirm('确认要删除吗？', function (index) {
        $.post("<?php echo url('admin/rule/deleteRule'); ?>", { 'id': id }, function success(response) {
          if (response.errno == 0) {
            layer.msg('删除成功', { icon: 1 });
            $(".layui-form-checked").not('.header').parents('tr').remove();
          } else {
            layer.msg('你没有选择要删除的规则!', { icon: 8, time: 1000 });
          }
        }, 'json')
      });
    }
    // 
    function updateStatus(data, id) {
      $.post("<?php echo url('admin/rule/updataOnOffRule'); ?>", { 'data': data, 'id': id }, function success(response) {
        if (response.errno == 0) {
          layer.msg('修改成功', { icon: 1, time: 500 });
        } else {
          layer.msg('系统错误', { icon: 8, time: 500 });
        }
      }, 'json')
    }
  </script>
</body>

</html>