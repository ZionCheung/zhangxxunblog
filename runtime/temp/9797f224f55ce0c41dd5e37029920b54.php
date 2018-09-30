<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"E:\www\zhangxxunblog\public/../application/admin\view\article\recycle.html";i:1537885663;s:62:"E:\www\zhangxxunblog\application\admin\view\public\header.html";i:1537885663;}*/ ?>
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
            <cite>文章回收站</cite>
        </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);"
            title="刷新">
            <i class="fa fa-refresh" style="line-height:30px; display: block; padding-top: 4px"></i>
        </a>
    </div>
    <div class="x-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 x-so" method="GET" action="<?php echo url('admin/article/articleRecycleBinList'); ?>">
                <input class="layui-input" autocomplete="off" placeholder="开始日" name="start" id="start">
                <input class="layui-input" autocomplete="off" placeholder="截止日" name="end" id="end">
                <div class="layui-input-inline">
                    <select name="user">
                        <option value="">发布者</option>
                        <?php if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$kuser): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $kuser['id']; ?>"><?php echo $kuser['ad_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <input type="text" name="key" placeholder="请输入文章编号/文章名称" autocomplete="off" class="layui-input" style="width:200px;">
                <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </form>
        </div>
        <xblock>
            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
            <button class="layui-btn" onclick="recoveryAll()"><i class="layui-icon">&#xe9aa;</i>批量还原</button>
            <span class="x-right" style="line-height:40px">共有数据：<?php echo $article['total']; ?> 条</span>
        </xblock>
        <table class="layui-table">
            <thead>
                <tr>
                    <?php if($userId == 1): ?>
                    <th>
                        <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
                    </th>
                    <?php endif; ?>
                    <th>编号</th>
                    <th>文章名称</th>
                    <th>文章作者</th>
                    <th>添加时间</th>
                    <th>删除时间</th>
                    <th>发布者</th>
                    <th width="40">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($article['data']) || $article['data'] instanceof \think\Collection || $article['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $article['data'];if( count($__LIST__)==0 ) : echo "暂时找不到内容" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $vo['id']; ?>'><i class="layui-icon">&#xe605;</i></div>
                    </td>
                    <td><?php echo $vo['article_serial']; ?></td>
                    <td><?php echo $vo['article_name']; ?></td>
                    <td><?php echo $vo['article_author']; ?></td>
                    <td><?php echo date("Y-m-d",$vo['article_time']); ?></td>
                    <td><?php echo date("Y-m-d H:i:s",$vo['article_recycle_time']); ?></td>
                    <td><?php echo $vo['username']; ?></td>
                    <td class="td-manage">
                        <a title="还原" class="layui-btn layui-btn-sm" style="display:block;margin-left: 0;margin-top: 2px;"
                            onclick="recoveryArticle(this,<?php echo $vo['id']; ?>)" href="javascript:;">
                            <i class="layui-icon">&#xe9aa;</i>还原
                        </a>
                        <a title="删除" class="layui-btn layui-btn-danger layui-btn-sm" style="display:block;margin-left: 0;margin-top: 2px;"
                            onclick="member_del(this,<?php echo $vo['id']; ?>)" href="javascript:;">
                            <i class="layui-icon">&#xe640;</i>彻底删除
                        </a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "暂时找不到内容" ;endif; ?>
            </tbody>
        </table>
        <div class="page">
            <?php echo $article['page']; ?>
        </div>
    </div>
    <script>
        layui.use('laydate', function () {
            var laydate = layui.laydate;

            //执行一个laydate实例
            laydate.render({
                elem: '#start' //指定元素
                , format: 'yyyyMMdd'
            });

            //执行一个laydate实例
            laydate.render({
                elem: '#end' //指定元素
                , format: 'yyyyMMdd'
            });
        });
        // 删除单个
        function member_del(obj, id) {
            layer.confirm('确定删除么?删除后数据将不可恢复', {
                btn: ['我要删除', '手滑点错了']
                , anim: 6
            }, function (index) {
                var countDown = 10;
                var down = setInterval(function () {
                    countDown--;
                    $('#time').html('<span style="color:#009900">请在' + countDown + '秒内完成验证!</span>');
                    if (countDown == 0) {
                        clearInterval(down);
                    }
                }, 1000);
                var num = Math.floor(Math.random() * 10);
                var numTwo = Math.floor(Math.random() * 10);
                var sum = Number(num) + Number(numTwo);
                var val = '<div id="time"></div><span id="errmge" style="color:red"></span>' + num + '  +  ' + numTwo + '  =  ' + "<input id='delecode' type='number' style='max-width:60px;'>";
                layer.open({
                    title: '请输入正确的运算结果!'
                    , content: val
                    , offset: 'auto'
                    , time: 10000
                    , closeBtn: 2
                    , cancel: function () {
                        clearInterval(down);
                    }
                    , yes: function () {
                        var code = $('#delecode').val();
                        if (code == sum) {
                            $.ajax({
                                type: 'post'
                                , dataType: 'json'
                                , url: "<?php echo url('admin/article/articleDelete'); ?>"
                                , data: { 'id': id }
                                , success: function (response) {
                                    clearInterval(down);
                                    $(obj).parents("tr").remove();
                                    layer.msg(response, { icon: 1, time: 1000 });
                                }
                            });
                        } else {
                            $('#errmge').html('验证错误!');
                        }
                    }
                });
            });
        }
        // 批量删除
        function delAll(argument) {
            var data = tableCheck.getData();
            var id = data.join(',');
            if (data.length == 0) return false;
            layer.confirm('确定删除么?删除后数据将不可恢复', {
                btn: ['我要删除', '手滑点错了']
                , anim: 6
            }, function (index) {
                var countDown = 10;
                var down = setInterval(function () {
                    countDown--;
                    $('#time').html('<span style="color:#009900">请在' + countDown + '秒内完成验证!</span>');
                    if (countDown == 0) {
                        clearInterval(down);
                    }
                }, 1000);
                var num = Math.floor(Math.random() * 10);
                var numTwo = Math.floor(Math.random() * 10);
                var sum = Number(num) + Number(numTwo);
                var val = '<div id="time"></div><span id="errmge" style="color:red"></span>' + num + '  +  ' + numTwo + '  =  ' + "<input id='delecode' type='number' style='max-width:60px;'>";
                layer.open({
                    title: '请输入正确的运算结果!'
                    , content: val
                    , time: 10000
                    , closeBtn: 2
                    , cancel: function () {
                        clearInterval(down);
                    }
                    , yes: function () {
                        var code = $('#delecode').val();
                        if (code == sum) {
                            $.ajax({
                                type: 'post'
                                , dataType: 'json'
                                , url: "<?php echo url('admin/article/articleDelete'); ?>"
                                , data: { 'id': id }
                                , success: function (response) {
                                    clearInterval(down);
                                    layer.msg(response, { icon: 1, time: 500 });
                                    $(".layui-form-checked").not('.header').parents('tr').remove();
                                }
                            });
                        } else {
                            $('#errmge').html('验证错误!');
                        }
                    }
                });
            });
        }
        // 批量还原
        function recoveryAll(argument) {
            var data = tableCheck.getData();
            if (data.length == 0) return false;
            layer.confirm("确定要还原文章么?", function () {
                $.ajax({
                    type: 'post'
                    , dataType: 'json'
                    , url: "<?php echo url('admin/article/articleRecovery'); ?>"
                    , data: { 'id': data }
                    , success: function (response) {
                        layer.msg(response, { icon: 1, time: 500 });
                        $(".layui-form-checked").not('.header').parents('tr').remove();
                    }
                });
            });
        }
        function recoveryArticle(obj, id) {
            var data = id;
            layer.confirm("确定要还原文章么?", function () {
                $.ajax({
                    type: 'post'
                    , dataType: 'json'
                    , url: "<?php echo url('admin/article/articleRecovery'); ?>"
                    , data: { 'id': data }
                    , success: function (response) {
                        $(obj).parents("tr").remove();
                        layer.msg(response, { icon: 1, time: 1000 });
                    }
                });
            });
        }
    </script>
</body>

</html>