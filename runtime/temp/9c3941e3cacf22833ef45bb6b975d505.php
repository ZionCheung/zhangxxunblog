<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"E:\www\zhangxxunblog\public/../application/admin\view\user\user.html";i:1538965571;s:62:"E:\www\zhangxxunblog\application\admin\view\public\header.html";i:1537885663;}*/ ?>
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
      <cite>管理员列表</cite>
    </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);"
      title="刷新">
      <i class="fa fa-refresh" style="line-height:30px; display: block; padding-top: 4px"></i></a>
  </div>
  <div class="x-body">
    <div class="layui-row">
      <form class="layui-form layui-col-md12 x-so" action="<?php echo url('admin/adminuser/adminUser'); ?>" method="GET">
        <input type="text" name="key" placeholder="用户账号/用户名/邮箱/手机号" autocomplete="off" class="layui-input" style="width:200px;">
        <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
      </form>
    </div>
    <xblock>
      <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
      <button class="layui-btn" onclick="x_admin_show('添加用户','<?php echo url('admin/adminuser/addadminuser'); ?>')"><i class="layui-icon"></i>添加</button>
      <span class="x-right" style="line-height:40px">共有数据：<i><?php echo $user['total']; ?></i> 条</span>
    </xblock>
    <table class="layui-table">
      <thead>
        <tr style="background-color:#ecc18c; color: #821d1d;">
          <?php if($userId===1): ?>
          <th>
            <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
          </th>
          <?php endif; ?>
          <th>编号</th>
          <th>用户账号</th>
          <th>用户名</th>
          <th>头像</th>
          <th>邮箱</th>
          <th>手机号</th>
          <th>添加时间</th>
          <th>添加IP</th>
          <th>登录权限</th>
          <th>操作</th>
      </thead>
      <tbody>
        <?php if(is_array($user['data']) || $user['data'] instanceof \think\Collection || $user['data'] instanceof \think\Paginator): $key = 0; $__LIST__ = $user['data'];if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
        <tr style="background-color:#f1d9bc;">
          <?php if($userId===1): ?>
          <td>
            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $vo['id']; ?>'><i class="layui-icon">&#xe605;</i></div>
          </td>
          <?php endif; ?>
          <td><?php echo $key; ?></td>
          <td><?php echo $vo['ad_username']; ?></td>
          <td><?php echo $vo['ad_name']; ?></td>
          <td>
            <?php if(strlen($vo['ad_headimg'])>11): ?>
            <img src="<?php echo $vo['ad_headimg']; ?>" alt="" style="border-radius: 4px; width: 80px; height: 80px;">
            <?php else: ?>
            <img src="/static/upload/admin/heads/<?php echo $vo['ad_headimg']; ?>" alt="" id="adhead-<?php echo $vo['id']; ?>" style="border-radius: 4px; width: 80px; height: 80px;">
            <?php endif; ?>
          </td>
          <td><?php echo $vo['ad_email']; ?></td>
          <td><?php echo $vo['ad_phone']; ?></td>
          <td><?php echo date('Y-m-d H:i:s',$vo['ad_retime']); ?></td>
          <td><?php echo $vo['ad_regip']; ?></td>
          <td>
            <input type="radio" name="sign_<?php echo $key; ?>" <?php if($vo['ad_sign']==1): ?> checked="checked" <?php else: endif; ?>
              onclick="statusOnOff(<?php echo $vo['id']; ?>)">开启 <input type="radio" name="sign_<?php echo $key; ?>" <?php if($vo['ad_sign']==0): ?> checked="checked" <?php else: endif; ?> onclick="statusOnOff(<?php echo $vo['id']; ?>)">关闭
          </td>
          <td class="td-manage">
            <?php if($vo['ad_username'] == $username): ?>
            <a title="编辑" onclick="x_admin_show('编辑','<?php echo url('admin/adminuser/updateUser',['uid' => $vo['id']]); ?>')" href="javascript:;"
              class="btn-edit">
              <i class="layui-icon">&#xe642;</i>编辑
            </a>
            <?php else: ?>
            <a title="无法编辑" href="javascript:;" class="btn-edit-lock">
              <i class="layui-icon">&#xe642;</i>编辑
            </a>
            <?php endif; ?>
            <a title="删除" onclick="member_del(this,<?php echo $vo['id']; ?>)" href="javascript:;" class="btn-detele">
              <i class="layui-icon">&#xe640;</i>删除
            </a>
          </td>
        </tr>
        <?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
      </tbody>
    </table>
    <div class="page">
      <div>
        <?php echo $user['page']; ?>
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

    /*用户-删除*/
    function member_del(obj, id) {
      var imgRoute = $('#adhead-' + id).attr('src');
      layer.confirm('确认要删除吗？', function (index) {
        $.ajax({
          type: 'POST',
          url: "<?php echo url('admin/adminuser/deleteadminuser'); ?>",
          data: { 'id': id, 'imgRoute': imgRoute },
          success: function (response) {
            $(obj).parents("tr").remove();
            layer.msg(response, { icon: 7, time: 500 });
          },
          dataType: "json"
        });
      });
    }
    // 修改登陆权限
    function statusOnOff(id) {
      $.ajax({
        type: 'POST',
        url: "<?php echo url('admin/adminuser/updateUserOnOff'); ?>",
        data: { 'id': id },
        success: function (response) {
          layer.msg(response, { icon: 7, time: 500 });
        },
        dataType: 'json'
      });
    }
  </script>
</body>

</html>