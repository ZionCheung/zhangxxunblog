<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"E:\www\zhangxxunblog\public/../application/admin\view\user\useraccess.html";i:1538965233;s:62:"E:\www\zhangxxunblog\application\admin\view\public\header.html";i:1537885663;}*/ ?>
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
        <input type="text" name="key" placeholder="用户账号/用户名" autocomplete="off" class="layui-input" style="width:200px;">
        <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
      </form>
    </div>
    <xblock>
      <button class="layui-btn" onclick="x_admin_show('添加用户','<?php echo url('admin/adminuser/addadminuser'); ?>')"><i class="layui-icon"></i>添加用户</button>
      <span class="x-right" style="line-height:40px">共有数据：<i><?php echo $user['total']; ?></i> 条</span>
    </xblock>
    <table class="layui-table">
      <thead>
        <tr style="background-color:#ecc18c; color: #821d1d;">
          <th>编号</th>
          <th>用户账号</th>
          <th>用户名</th>
          <th>所有权限</th>
          <th>操作</th>
      </thead>
      <tbody>
        <?php if(is_array($user['data']) || $user['data'] instanceof \think\Collection || $user['data'] instanceof \think\Paginator): $key = 0; $__LIST__ = $user['data'];if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
        <tr style="background-color:#f1d9bc;">
          <td><?php echo $key; ?></td>
          <td><?php echo $vo['ad_username']; ?></td>
          <td><?php echo $vo['ad_name']; ?></td>
          <td>
            <?php if(is_array($vo['role']) || $vo['role'] instanceof \think\Collection || $vo['role'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['role'];if( count($__LIST__)==0 ) : echo "没有分配权限" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <span style="color:#fff;background-color:rgb(55,172,199);padding:4px;border-radius:4px"><?php echo $v; ?></span>
            <?php endforeach; endif; else: echo "没有分配权限" ;endif; ?>
          </td>
          <td class="td-manage" style="text-align:center;">
            <a title="分配权限" onclick="x_admin_show('编辑','<?php echo url('admin/adminuser/addUserAccess',['uid'=>$vo['id'],'uname'=>$vo['ad_username']]); ?>')"
              href="javascript:;" class="btn-edit">
              <i class="layui-icon">&#xe642;</i>分配权限
            </a>
          </td>
        </tr>
        <?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
      </tbody>
    </table>
    <div class="page">
      <div>
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
  </script>
</body>

</html>