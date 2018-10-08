<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"E:\www\zhangxxunblog\public/../application/admin\view\cate\cate.html";i:1538977939;s:62:"E:\www\zhangxxunblog\application\admin\view\public\header.html";i:1537885663;}*/ ?>
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
      <cite>分类列表</cite></a>
    </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);"
      title="刷新">
      <i class="fa fa-refresh" style="line-height:30px; display: block; padding-top: 4px"></i></a>
  </div>
  <div class="x-body">
    <xblock>
      <button class="layui-btn" lay-submit="" onclick="x_admin_show('添加分类','<?php echo url('admin/webcate/addcate'); ?>')"><i class="layui-icon"></i>增加</button>
      <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
      <span class="x-right" style="line-height:40px">目前共有：<?php echo $cateTotal; ?> 个分类</span>
    </xblock>
    <table class="layui-table layui-form">
      <thead>
        <tr>
          <th width="20">
            <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
          </th>
          <th width="70">编号</th>
          <th>分类名</th>
          <th width="50">排序</th>
          <th width="70">分类状态</th>
          <th width="220">操作</th>
      </thead>
      <tbody class="x-cate">
        <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
        <tr cate-id='<?php echo $data['id']; ?>' fid='0'>
          <td>
            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $data['id']; ?>'><i class="layui-icon">&#xe605;</i></div>
          </td>
          <td><?php echo $i; ?></td>
          <td>
            <?php if(!empty($data['child'])): ?>
            <i class="layui-icon x-show" status='true'>&#xe623;</i>
            <?php else: endif; ?> <?php echo $data['cate_name']; ?>
          </td>
          <td><input type="number" min="0" class="layui-input x-sort catesort-<?php echo $data['id']; ?>" name="catesort" value="<?php echo $data['cate_sort']; ?>" onblur="upDateSort($(this).val(),<?php echo $data['id']; ?>)"></td>
          <td>
            <input type="checkbox" name="switch" lay-text="开启|停用" checked="" lay-skin="switch">
          </td>
          <td class="td-manage">
            <button class="layui-btn layui-btn layui-btn-xs" onclick="x_admin_show('编辑','<?php echo url('admin/webcate/upDateCate',['id'=>$data['id'],'catename'=>$data['cate_name']]); ?>')"><i class="layui-icon">&#xe642;</i>编辑</button>
            <button class="layui-btn layui-btn-warm layui-btn-xs" onclick="x_admin_show('添加子分类','<?php echo url('admin/webcate/addcate',['id'=>$data['id']]); ?>')"><i
                class="layui-icon">&#xe642;</i>添加子栏目</button>
            <?php if(empty($data['child'])): ?>
            <button class="layui-btn-danger layui-btn layui-btn-xs" onclick="member_del(this,'<?php echo $data['id']; ?>')" href="javascript:;"><i
                class="layui-icon">&#xe640;</i>删除</button>
            <?php else: endif; ?>
          </td>
        </tr>
        <?php if(is_array($data['child']) || $data['child'] instanceof \think\Collection || $data['child'] instanceof \think\Paginator): $key = 0; $__LIST__ = $data['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($key % 2 );++$key;?>
        <tr cate-id='<?php echo $v['id']; ?>' fid='<?php echo $data['id']; ?>'>
          <td>
            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $v['id']; ?>'><i class="layui-icon">&#xe605;</i></div>
          </td>
          <td><?php echo $key; ?></td>
          <td>
            &nbsp;&nbsp;&nbsp;&nbsp; <?php if(!empty($v['child'])): ?>
            <i class="layui-icon x-show" status='true'>&#xe623;</i>
            <?php else: ?><i> -- </i>
            <?php endif; ?> <?php echo $v['cate_name']; ?>
          </td>
          <td><input type="number" min="0" class="layui-input x-sort catesort-<?php echo $v['id']; ?>" name="catesort" value="<?php echo $v['cate_sort']; ?>" onchange="upDateSort($(this).val(),<?php echo $v['id']; ?>)"></td>
          <td>
            <input type="checkbox" name="switch" lay-text="开启|停用" checked="" lay-skin="switch">
          </td>
          <td class="td-manage">
            <button class="layui-btn layui-btn layui-btn-xs" onclick="x_admin_show('编辑','admin-edit.html')"><i class="layui-icon">&#xe642;</i>编辑</button>
            <button class="layui-btn-danger layui-btn layui-btn-xs" onclick="member_del(this,'<?php echo $v['id']; ?>')" href="javascript:;"><i
                class="layui-icon">&#xe640;</i>删除</button>
          </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
      </tbody>
    </table>
  </div>
  <style type="text/css">
  </style>
  <script>
    layui.use(['form'], function () {
      form = layui.form;
    });
    // 排序修改
    function upDateSort (sort,id) {
        var cateSort = sort;
        var cateId = id;
        $.post("<?php echo url('admin/webcate/upDateSortHandle'); ?>",{'id':cateId,'sort':cateSort},function success(response){
          if (response.errno == 0){
              window.location.reload();
          }
        },'json')
    }
    /*删除*/
    function member_del(obj, id) {
      layer.confirm('确认要删除吗？', function (index) {
        $.post("<?php echo url('admin/webcate/deleteHandle'); ?>", { 'id': id }, function success(response) {
          if (response.errno == 0) {
            $(obj).parents("tr").remove();
            layer.msg('已删除!', { icon: 1, time: 1000 });
          }
        }, 'json');
      });
    }
    // 删除多个
    function delAll(argument) {
      var data = tableCheck.getData();
      var id = data.join(",");
      layer.confirm('确认要删除吗？', function (index) {
        $.post("<?php echo url('admin/webcate/deleteHandle'); ?>", { 'id': id }, function success(response) {
          if (response.errno == 0) {
            layer.msg('删除成功', { icon: 1 });
            $(".layui-form-checked").not('.header').parents('tr').remove();
          }
        }, 'json');
      });
    }
  </script>
</body>

</html>