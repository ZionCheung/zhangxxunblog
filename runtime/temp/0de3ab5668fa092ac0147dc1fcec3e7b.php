<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"E:\www\zhangxxunblog\public/../application/admin\view\banner\banner.html";i:1537885663;s:62:"E:\www\zhangxxunblog\application\admin\view\public\header.html";i:1537885663;}*/ ?>
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
            <cite>banner列表</cite>
        </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);"
            title="刷新">
            <i class="fa fa-refresh" style="line-height:30px; display: block; padding-top: 4px"></i>
        </a>
    </div>
    <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief" style="padding:0 18px; background-color:#f5efef;">
        <ul class="layui-tab-title" style="color:#6f626f">
            <li class="layui-this">banner-网站首页</li>
            <li>banner-心灵鸡汤</li>
            <li>banner-喧嚣生活</li>
        </ul>
        <div class="layui-tab-content">
            <!-- banner-首页 -->
            <div class="layui-tab-item layui-show">
                <div class="x-body">
                    <xblock>
                        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                        <button class="layui-btn" onclick="x_admin_show('banner预览','<?php echo url('admin/banner/bannerpreview',['cid'=>1]); ?>')"><i
                                class="fa fa-eye"></i>预览</button>
                        <span class="x-right" style="line-height:40px">共有数据：<?php echo $berHome['total']; ?> 条</span>
                    </xblock>
                    <table class="layui-table layui-form">
                        <thead>
                            <tr style="background-color:#ff5722;color: #fff;">
                                <th width="20"></th>
                                <th width="70">编号</th>
                                <th>预览图</th>
                                <th>链接地址(点击测试)</th>
                                <th>描述</th>
                                <th>添加时间</th>
                                <th width="50">排序</th>
                                <th width="70">状态</th>
                                <th width="180">操作</th>
                            </tr>
                        </thead>
                        <tbody class="x-cate">
                            <?php if(is_array($berHome['data']) || $berHome['data'] instanceof \think\Collection || $berHome['data'] instanceof \think\Paginator): $key = 0; $__LIST__ = $berHome['data'];if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
                            <tr cate-id='<?php echo $vo['id']; ?>' fid='0'>
                                <td>
                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $vo['id']; ?>'><i
                                            class="layui-icon" style="border-radius:50%;">&#xe605;</i></div>
                                </td>
                                <td><?php echo $key; ?></td>
                                <td style="text-align:center;">
                                    <img class="bimg" id="bimg-<?php echo $vo['id']; ?>" src="<?php echo $vo['banner_route']; ?>" alt="" style="max-width:320px;">
                                </td>
                                <td style="max-width:100px;"><a href="<?php echo $vo['banner_link']; ?>" target="_block"><?php echo $vo['banner_link']; ?></a></td>
                                <td style="max-width:100px;"><?php echo $vo['banner_desc']; ?></td>
                                <td><?php echo date("Y-m-d",$vo['banner_time']); ?></td>
                                <td style="max-width:40px;"><input type="text" class="layui-input x-sort" name="order"
                                        value="<?php echo $vo['banner_sort']; ?>" onchange="banerSortBtn($(this).val(),<?php echo $vo['id']; ?>)"></td>
                                <td style="text-align:center;">
                                    <input type="checkbox" name="" lay-text="开启|关闭" lay-skin="switch" value="<?php echo $vo['id']; ?>"
                                        <?php if($vo['banner_sign']==1): ?> checked="checked" <?php else: endif; ?>> </td> <td
                                        class="td-manage" style="text-align:center;">
                                    <button class="layui-btn layui-btn layui-btn-sm" onclick="x_admin_show('banner修改','<?php echo url('admin/banner/bannerUpdate',['id'=>$vo['id']]); ?>')"><i
                                            class="layui-icon">&#xe642;</i>编辑</button>
                                    <button class="layui-btn-danger layui-btn layui-btn-sm" onclick="member_del(this,<?php echo $vo['id']; ?>)"
                                        href="javascript:;"><i class="layui-icon">&#xe640;</i>删除</button>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                        </tbody>
                    </table>
                    <div class="page">
                        <div>
                            <?php echo $berHome['page']; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- banner-心灵鸡汤 -->
            <div class="layui-tab-item">
                <div class="x-body">
                    <xblock>
                        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                        <button class="layui-btn" onclick="x_admin_show('banner预览','<?php echo url('admin/banner/bannerpreview',['cid'=>3]); ?>')"><i
                                class="fa fa-eye"></i>预览</button>
                        <span class="x-right" style="line-height:40px">共有数据：<?php echo $berHeart['total']; ?> 条</span>
                    </xblock>
                    <table class="layui-table layui-form">
                        <thead>
                            <tr style="background-color:#ff5722;color: #fff;">
                                <th width="20"></th>
                                <th width="70">编号</th>
                                <th>预览图</th>
                                <th>链接地址(点击测试)</th>
                                <th>描述</th>
                                <th>添加时间</th>
                                <th width="50">排序</th>
                                <th width="70">状态</th>
                                <th width="180">操作</th>
                            </tr>
                        </thead>
                        <tbody class="x-cate">
                            <?php if(is_array($berHeart['data']) || $berHeart['data'] instanceof \think\Collection || $berHeart['data'] instanceof \think\Paginator): $key = 0; $__LIST__ = $berHeart['data'];if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
                            <tr cate-id='<?php echo $vo['id']; ?>' fid='0'>
                                <td>
                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $vo['id']; ?>'><i
                                            class="layui-icon" style="border-radius:50%;">&#xe605;</i></div>
                                </td>
                                <td><?php echo $key; ?></td>
                                <td style="text-align:center;">
                                    <img class="bimg" id="bimg-<?php echo $vo['id']; ?>" src="<?php echo $vo['banner_route']; ?>" alt="" style="max-width:320px;">
                                </td>
                                <td style="max-width:100px;"><a href="<?php echo $vo['banner_link']; ?>" target="_block"><?php echo $vo['banner_link']; ?></a></td>
                                <td style="max-width:100px;"><?php echo $vo['banner_desc']; ?></td>
                                <td><?php echo date("Y-m-d",$vo['banner_time']); ?></td>
                                <td style="max-width:40px;"><input type="text" class="layui-input x-sort" name="bsort"
                                        value="<?php echo $vo['banner_sort']; ?>" onblur="banerSortBtn($(this).val(),<?php echo $vo['id']; ?>)"></td>
                                <td style="text-align:center;">
                                    <input type="checkbox" name="" lay-text="开启|关闭" lay-skin="switch" value="<?php echo $vo['id']; ?>"
                                        <?php if($vo['banner_sign']==1): ?> checked="checked" <?php else: endif; ?>> </td> <td
                                        class="td-manage" style="text-align:center;">
                                    <button class="layui-btn layui-btn layui-btn-sm" onclick="x_admin_show('banner修改','<?php echo url('admin/banner/bannerUpdate',['id'=>$vo['id']]); ?>')"><i
                                            class="layui-icon">&#xe642;</i>编辑</button>
                                    <button class="layui-btn-danger layui-btn layui-btn-sm" onclick="member_del(this,<?php echo $vo['id']; ?>)"
                                        href="javascript:;"><i class="layui-icon">&#xe640;</i>删除</button>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                        </tbody>
                    </table>
                    <div class="page">
                        <div>
                            <?php echo $berHeart['page']; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- banner-喧嚣生活 -->
            <div class="layui-tab-item">
                <div class="x-body">
                    <xblock>
                        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                        <button class="layui-btn" onclick="x_admin_show('banner预览','<?php echo url('admin/banner/bannerpreview',['cid'=>4]); ?>')"><i
                                class="fa fa-eye"></i>预览</button>
                        <span class="x-right" style="line-height:40px">共有数据：<?php echo $berLife['total']; ?> 条</span>
                    </xblock>
                    <table class="layui-table layui-form">
                        <thead>
                            <tr style="background-color:#ff5722;color: #fff;">
                                <th width="20"></th>
                                <th width="70">编号</th>
                                <th>预览图</th>
                                <th>链接地址(点击测试)</th>
                                <th>描述</th>
                                <th>添加时间</th>
                                <th width="50">排序</th>
                                <th width="70">状态</th>
                                <th width="180">操作</th>
                            </tr>
                        </thead>
                        <tbody class="x-cate">
                            <?php if(is_array($berLife['data']) || $berLife['data'] instanceof \think\Collection || $berLife['data'] instanceof \think\Paginator): $key = 0; $__LIST__ = $berLife['data'];if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
                            <tr cate-id='<?php echo $vo['id']; ?>' fid='0'>
                                <td>
                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $vo['id']; ?>'><i
                                            class="layui-icon" style="border-radius:50%;">&#xe605;</i></div>
                                </td>
                                <td><?php echo $key; ?></td>
                                <td style="text-align:center;">
                                    <img class="bimg" id="bimg-<?php echo $vo['id']; ?>" src="<?php echo $vo['banner_route']; ?>" alt="" style="max-width:320px;">
                                </td>
                                <td style="max-width:100px;"><a href="<?php echo $vo['banner_link']; ?>" target="_block"><?php echo $vo['banner_link']; ?></a></td>
                                <td style="max-width:100px;"><?php echo $vo['banner_desc']; ?></td>
                                <td><?php echo date("Y-m-d",$vo['banner_time']); ?></td>
                                <td style="max-width:40px;"><input type="text" class="layui-input x-sort" name="order"
                                        value="<?php echo $vo['banner_sort']; ?>" onblur="banerSortBtn($(this).val(),<?php echo $vo['id']; ?>)"></td>
                                <td style="text-align:center;">
                                    <input type="checkbox" name="" id="" lay-text="开启|关闭" lay-skin="switch" value="<?php echo $vo['id']; ?>"
                                        <?php if($vo['banner_sign']==1): ?> checked="checked" <?php else: endif; ?>> </td> <td
                                        class="td-manage" style="text-align:center;">
                                    <button class="layui-btn layui-btn-sm" onclick="x_admin_show('banner修改','<?php echo url('admin/banner/bannerUpdate',['id'=>$vo['id']]); ?>')"><i
                                            class="layui-icon">&#xe642;</i>编辑</button>
                                    <button class="layui-btn-danger layui-btn layui-btn-sm" onclick="member_del(this,<?php echo $vo['id']; ?>)"
                                        href="javascript:;"><i class="layui-icon">&#xe640;</i>删除</button>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                        </tbody>
                    </table>
                    <div class="page">
                        <div>
                            <?php echo $berLife['page']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        layui.use('element', function () {
            var $ = layui.jquery
                , element = layui.element;
        });
    </script>
    <script>
        layui.use(['form'], function () {
            form = layui.form;
            form.on('switch()', function (data) {
                var berId = this.value;
                var berOn = this.checked;
                $.ajax({
                    type: 'POST',
                    url: "<?php echo url('admin/banner/bannerOnOff'); ?>",
                    data: { 'id': berId },
                    dataType: 'json',
                    success: function (response) {
                        layer.tips(response, data.othis)
                    }
                });
            });
        });
        function member_del(obj, id) {
            var imgRoute = $('#bimg-' + id).attr('src');
            layer.confirm('确认要删除吗？', function (index) {
                $.ajax({
                    type: 'POST'
                    , url: "<?php echo url('admin/banner/deleteBanner'); ?>"
                    , data: { 'id': id, 'imgRoute': imgRoute }
                    , dataType: 'json'
                    , success: function (response) {
                        $(obj).parents("tr").remove();
                        layer.msg(response, { icon: 1, time: 500 });
                    }
                });
            });
        }
        function delAll(argument) {
            var data = tableCheck.getData();
            var bId = data.join(',');
            layer.confirm('确认要删除吗？', function (index) {
                $.ajax({
                    type: 'POST'
                    , url: "<?php echo url('admin/banner/deleteBanner'); ?>"
                    , data: { 'id': bId, 'imgRoute': '' }
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
        $('.bimg').zoomify();
        function banerSortBtn(sort, id) {
            $.ajax({
                type: 'post'
                , url: "<?php echo url('admin/banner/bannerOrderUpdate'); ?>"
                , data: { 'sort': sort, 'id': id }
                , dataType: 'json'
                , success: function (response) {
                    layer.msg(response);
                }
            });
        }
    </script>
</body>

</html>