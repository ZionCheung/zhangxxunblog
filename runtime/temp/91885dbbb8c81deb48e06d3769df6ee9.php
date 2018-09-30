<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"E:\www\zhangxxunblog\public/../application/admin\view\tags\tags.html";i:1537885663;s:62:"E:\www\zhangxxunblog\application\admin\view\public\header.html";i:1537885663;}*/ ?>
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
            <cite>标签列表</cite>
        </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);"
            title="刷新">
            <i class="fa fa-refresh" style="line-height:30px; display: block; padding-top: 4px"></i></a>
    </div>
    <div class="x-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 x-so" action="<?php echo url('admin/tags/tags'); ?>" method="GET">
                <input type="text" name="key" placeholder="标签名称/标签描述" autocomplete="off" class="layui-input" style="width:200px;">
                <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </form>
        </div>
        <xblock>
            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
            <button class="layui-btn" onclick="x_admin_show('添加标签','<?php echo url('admin/tags/addtags'); ?>')"><i class="layui-icon"></i>添加</button>
            <span class="x-right" style="line-height:40px">共有数据：<i><?php echo $tags['total']; ?></i> 条</span>
        </xblock>
        <table class="layui-table">
            <thead>
                <tr style="background-color:#2F4056; color: #fff;">
                    <th>
                        <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
                    </th>
                    <th>编号</th>
                    <th>标签名称</th>
                    <th>创建时间</th>
                    <th>标签颜色/展示</th>
                    <th>标签描述</th>
                    <th width="60">排序</th>
                    <th>标签开关</th>
                    <th>操作</th>
            </thead>
            <tbody>
                <?php if(is_array($tags['data']) || $tags['data'] instanceof \think\Collection || $tags['data'] instanceof \think\Paginator): $key = 0; $__LIST__ = $tags['data'];if( count($__LIST__)==0 ) : echo "暂时没有数据哦!" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
                <tr style="background-color:#667890;color:#fff">
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $vo['id']; ?>'><i class="layui-icon">&#xe605;</i></div>
                    </td>
                    <td><?php echo $key; ?></td>
                    <td><?php echo $vo['tags_title']; ?></td>
                    <td><?php echo date('Y-m-d',$vo['tags_time']); ?></td>
                    <td>
                        <span style="display:block;padding: 8px;background-color: <?php echo $vo['tags_color']; ?>;color: #fff;border-radius:4px;"><?php echo $vo['tags_title']; ?></span>
                    </td>
                    <td><?php echo $vo['tags_desc']; ?></td>
                    <td>
                        <input type="number" min="0" class="layui-input x-sort tags-<?php echo $vo['id']; ?>" name="tagssort" value="<?php echo $vo['tags_sort']; ?>"
                        onchange="upDateTagsSort($(this).val(),<?php echo $vo['id']; ?>)">
                    </td>
                    <td>
                        <input type="radio" name="tsign-<?php echo $vo['id']; ?>" value="" <?php if($vo['tags_sign']==1): ?>checked="checked"
                            <?php endif; ?> onclick="updateTagsSign(<?php echo $vo['id']; ?>)">显示中
                        <input type="radio" name="tsign-<?php echo $vo['id']; ?>" value="" <?php if($vo['tags_sign']==0): ?>checked="checked"
                            <?php endif; ?> onclick="updateTagsSign(<?php echo $vo['id']; ?>)">未显示
                    </td>
                    <td class="td-manage" style="text-align:center;">
                        <a title="编辑" onclick="x_admin_show('编辑','<?php echo url('admin/tags/tagsUpdate',['id' => $vo['id']]); ?>')"
                            href="javascript:;" class="btn-edit" style="background-color:#074444;">
                            <i class="layui-icon">&#xe642;</i>编辑
                        </a>
                        <a title="删除" onclick="member_del(this,<?php echo $vo['id']; ?>)" href="javascript:;" class="btn-detele">
                            <i class="layui-icon">&#xe640;</i>删除
                        </a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "暂时没有数据哦!" ;endif; ?>
            </tbody>
        </table>
        <div class="page">
            <div>
                <?php echo $tags['page']; ?>
            </div>
        </div>

    </div>
    <script>
        layui.use('laydate', function () {
            var laydate = layui.laydate;
        });
        function member_del(obj, id) {
            layer.confirm('确认要删除吗？', function (index) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo url('admin/tags/tagsDelete'); ?>",
                    data: { 'id': id },
                    success: function (response) {
                        $(obj).parents("tr").remove();
                        layer.msg(response, { icon: 7, time: 500 });
                    },
                    dataType: "json"
                });
            });
        }
        function delAll(argument) {
            var data = tableCheck.getData();
            var tId = data.join(',');
            layer.confirm('确认要删除吗？', function (index) {
                $.ajax({
                    type: 'POST'
                    , url: "<?php echo url('admin/tags/tagsDelete'); ?>"
                    , data: { 'id': tId }
                    , dataType: 'json'
                    , success: function (response) {
                        layer.msg('删除成功', { icon: 1 });
                        $(".layui-form-checked").not('.header').parents('tr').remove();
                    }
                });
            });
        }
    </script>
    <script>
        function upDateTagsSort(sort, id) {
            $.ajax({
                type: 'post'
                , url: "<?php echo url('admin/tags/tagssort'); ?>"
                , data: { 'id': id, 'sort': sort }
                , dataType: 'json'
                , success: function (response) {
                    if (response.errno == 0) {
                        layer.msg(response.mge, { icon: 7, time: 500 }, function () {
                            window.location.reload();
                        });
                    }
                }
            });
        }
        function updateTagsSign(id) {
            $.ajax({
                type: 'post'
                , url: "<?php echo url('admin/tags/tagssign'); ?>"
                , data: { 'id': id }
                , dataType: 'json'
                , success: function (response) {
                    layer.msg(response, { icon: 7, time: 500 });
                }
            });
        }
    </script>
</body>

</html>