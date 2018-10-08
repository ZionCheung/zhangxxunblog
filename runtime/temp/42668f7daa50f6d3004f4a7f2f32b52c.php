<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"E:\www\zhangxxunblog\public/../application/admin\view\rule\role.html";i:1538964589;s:62:"E:\www\zhangxxunblog\application\admin\view\public\header.html";i:1537885663;}*/ ?>
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
        <cite>导航元素</cite></a>
    </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);"
      title="刷新">
      <i class="fa fa-refresh" style="line-height:30px; display: block; padding-top: 4px"></i></a>
  </div>
  <div class="x-body">
    <div class="layui-row">
      <form class="layui-form layui-col-md12 x-so" method="GET" action="<?php echo url('admin/role/role'); ?>">
        <input type="text" name="key" placeholder="请输入角色名/描述" autocomplete="off" class="layui-input">
        <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
      </form>
    </div>
    <xblock>
      <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
      <button class="layui-btn" onclick="x_admin_show('添加角色','<?php echo url('admin/role/addrole'); ?>')"><i class="layui-icon"></i>添加</button>
      <span class="x-right" style="line-height:40px">共有数据：<?php echo $role['total']; ?> 条</span>
    </xblock>
    <table class="layui-table">
      <thead>
        <tr>
          <th>
            <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
          </th>
          <th>ID</th>
          <th>角色名</th>
          <th>拥有权限规则</th>
          <th>描述</th>
          <th>状态</th>
          <th>操作</th>
      </thead>
      <tbody>
        <?php if(is_array($role['data']) || $role['data'] instanceof \think\Collection || $role['data'] instanceof \think\Paginator): $key = 0; $__LIST__ = $role['data'];if( count($__LIST__)==0 ) : echo "当前没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
        <tr>
          <td>
            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $vo['id']; ?>'><i class="layui-icon">&#xe605;</i></div>
          </td>
          <td><?php echo $key; ?></td>
          <td><?php echo $vo['title']; ?></td>
          <td style="max-width:296px">
            <?php if(is_array($vo['ruleTitle']) || $vo['ruleTitle'] instanceof \think\Collection || $vo['ruleTitle'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['ruleTitle'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <span class="rule-list"><?php echo $v; ?></span>
            <?php endforeach; endif; else: echo "" ;endif; ?>
          </td>
          <td><?php echo $vo['describe']; ?></td>
          <td class="td-status">
            <?php if($vo['status'] == 1): ?>
            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span>
            <?php else: ?>
            <span class="layui-btn layui-btn-normal layui-btn-disabled">已停用</span>
            <?php endif; ?>
          </td>
          <td class="td-manage">
            <?php if($vo['status'] == 1): ?>
            <a onclick="member_stop(this,<?php echo $vo['id']; ?>)" href="javascript:;" title="启用">
              <i class="layui-icon" style="margin-right: 8px;">&#xe601;点击禁用</i>
              <?php else: ?>
              <a onclick="member_stop(this,<?php echo $vo['id']; ?>)" href="javascript:;" title="禁用">
                <i class="layui-icon" style="color:#009900;margin-right: 8px;">&#xe62f;点击启用</i>
                <?php endif; ?>
              </a>
              <a title="编辑" onclick="x_admin_show('角色编辑','<?php echo url('admin/role/updateRole',['id'=>$vo['id']]); ?>')" href="javascript:;">
                <i class="layui-icon" style="color:#0493be; margin-right: 4px;">&#xe642;</i><span style="color:#0493be">编辑</span>
              </a>
              <a title="删除" onclick="member_del(this,<?php echo $vo['id']; ?>)" href="javascript:;">
                <i class="layui-icon" style="color:#ff5e00">&#xe640;</i><span style="color:#ff5e00">删除</span>
              </a>
          </td>
        </tr>
        <?php endforeach; endif; else: echo "当前没有数据" ;endif; ?>
      </tbody>
    </table>
    <div class="page">
      <div>
        <?php echo $role['page']; ?>
      </div>
    </div>

  </div>
  <script>
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

    /*停用*/
    function member_stop(obj, id) {

      layer.confirm('确认要禁用/开启该角色吗？', function (index) {

        if ($(obj).attr('title') == '启用') {

          $.post("<?php echo url('admin/role/updateOnOffRole'); ?>", { 'id': id }, function success(response) {
          }, 'json');
          $(obj).attr('title', '停用')
          $(obj).find('i').html('<i class="layui-icon" style="color:#009900">&#xe62f;点击启用</i>');

          $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
          layer.msg('已停用!', { icon: 5, time: 500 });
        } else {
          $.post("<?php echo url('admin/role/updateOnOffRole'); ?>", { 'id': id }, function success(response) {
          }, 'json');
          $(obj).attr('title', '启用')
          $(obj).find('i').html('&#xe601;点击禁用');

          $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
          layer.msg('已启用!', { icon: 6, time: 500 });
        }

      });
    }

    /*删除*/
    function member_del(obj, id) {
      layer.confirm('确认要删除吗？', function (index) {
        $.post("<?php echo url('admin/role/deleteRole'); ?>", { 'id': id }, function success(response) {
          $(obj).parents("tr").remove();
          layer.msg(response, { icon: 7, time: 500 });
        }, 'json');
      });
    }

    // 批量删除
    function delAll(argument) {
      var data = tableCheck.getData();
      var id = data.join(',');
      layer.confirm('确认要删除吗？', function (index) {
        $.post("<?php echo url('admin/role/deleteRole'); ?>", { 'id': id }, function success(response) {
          layer.msg(response, { icon: 7, time: 500 });
          $(".layui-form-checked").not('.header').parents('tr').remove();
        }, 'json');
      });
    }
  </script>
</body>

</html>