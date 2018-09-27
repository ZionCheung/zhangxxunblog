<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"E:\www\zhangxxunblog\public/../application/admin\view\article\article.html";i:1537931034;s:62:"E:\www\zhangxxunblog\application\admin\view\public\header.html";i:1537885663;}*/ ?>
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
            <cite>文章内容添加</cite>
        </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);"
            title="刷新">
            <i class="fa fa-refresh" style="line-height:30px; display: block; padding-top: 4px"></i>
        </a>
    </div>
    <div class="x-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 x-so" method="GET" action="<?php echo url('admin/article/article'); ?>">
                <input class="layui-input" placeholder="选择开始日期" name="start" id="start" autocomplete="off">
                -<input class="layui-input" placeholder="选择结束日期" name="end" id="end" autocomplete="off">
                <div class="layui-input-inline">
                    <select name="asign">
                        <option value="">文章状态</option>
                        <option value="1">已发布</option>
                        <option value="0">隐藏中</option>
                    </select>
                </div>
                <div class="layui-input-inline">
                    <select name="acate">
                        <option value="">文章分类</option>
                        <?php if(is_array($article['kcate']) || $article['kcate'] instanceof \think\Collection || $article['kcate'] instanceof \think\Paginator): $i = 0; $__LIST__ = $article['kcate'];if( count($__LIST__)==0 ) : echo "暂时没有分类" ;else: foreach($__LIST__ as $key=>$kcate): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $kcate['cateid']; ?>"><?php echo $kcate['catename']; ?></option>
                        <?php endforeach; endif; else: echo "暂时没有分类" ;endif; ?>
                    </select>
                </div>
                <div class="layui-input-inline">
                    <select name="auser">
                        <option value="">发布者</option>
                        <?php if(is_array($article['kuser']) || $article['kuser'] instanceof \think\Collection || $article['kuser'] instanceof \think\Paginator): $i = 0; $__LIST__ = $article['kuser'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$kuser): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $kuser['userid']; ?>"><?php echo $kuser['uname']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <input type="text" name="key" placeholder="请输入文章编号/文章标题" autocomplete="off" class="layui-input" style="width:200px;">
                <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </form>
        </div>
        <xblock>
            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
            <button class="layui-btn" onclick="x_admin_show('添加文章','<?php echo url('admin/article/addarticle'); ?>')"><i class="layui-icon"></i>添加</button>
            <span class="x-right" style="line-height:40px">共有文章：<?php echo $article['total']; ?> 篇</span>
        </xblock>
        <table class="layui-table">
            <thead>
                <tr>
                    <th width="40">
                        <?php if($userId==1): ?>
                        <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
                        <?php endif; ?>
                    </th>
                    <th width='110'>文章编号</th>
                    <th width="">文章标题</th>
                    <th width='80'>文章封面</th>
                    <th width="75">添加时间</th>
                    <th width="60">所属分类</th>
                    <th width="100">所属标签</th>
                    <th width="45">点击量</th>
                    <th width="45">关注量</th>
                    <th width="80">发布者</th>
                    <th width="60">排序</th>
                    <th width="90">文章状态</th>
                    <th width="60">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($article['data']) || $article['data'] instanceof \think\Collection || $article['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $article['data'];if( count($__LIST__)==0 ) : echo "暂时没有数据哦!" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $vo['id']; ?>'><i class="layui-icon">&#xe605;</i></div>
                    </td>
                    <td><?php echo $vo['article_serial']; ?></td>
                    <td><?php echo $vo['article_name']; ?></td>
                    <td>
                        <img src="/static/upload/article/thumb/<?php echo $vo['article_cover']; ?>" alt="" class="article-img">
                    </td>
                    <td><?php echo date('Y-m-d',$vo['article_time']); ?></td>
                    <td><?php echo $vo['cate']; ?></td>
                    <td style="overflow-y:auto;height:78px;max-height:78px;display: block;">
                        <?php if(is_array($vo['tags']) || $vo['tags'] instanceof \think\Collection || $vo['tags'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['tags'];if( count($__LIST__)==0 ) : echo "当前没有标签" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <span style="display: inline-block; margin-top: 2px; border-radius:2px;padding:2px;background-color:<?php echo $v['tags_color']; ?>;color:#fff"><?php echo $v['tags_title']; ?></span>
                        <?php endforeach; endif; else: echo "当前没有标签" ;endif; ?>
                    </td>
                    <td><?php echo $vo['article_click']; ?></td>
                    <td><?php echo $vo['article_like']; ?></td>
                    <td><?php echo $vo['username']; ?></td>
                    <td>
                        <input type="number" min="0" value="<?php echo $vo['article_sort']; ?>" class="layui-input" onchange="articleSort($(this).val(),<?php echo $vo['id']; ?>)">
                    </td>
                    <td style="text-align:center;">
                        <input type="radio" onclick="articleSignOnOff(<?php echo $vo['id']; ?>)" name="aclesign_<?php echo $vo['id']; ?>" id="aclesign"
                            <?php if($vo['article_sign'] == 1): ?>checked<?php endif; ?>>发布 <input type="radio" onclick="articleSignOnOff(<?php echo $vo['id']; ?>)"
                            name="aclesign_<?php echo $vo['id']; ?>" id="aclesign" <?php if($vo['article_sign'] == 0): ?>checked<?php endif; ?>>隐藏
                            </td> <td class="td-manage" style="text-align:center">
                        <?php if($vo['article_sign'] == 0): ?>
                        <a title="查看" class="layui-btn layui-btn-xs" style="display:block;" onclick="x_admin_show('修改文章','<?php echo url('admin/article/articleUpDate',['aid'=>$vo['id'],'serial'=>$vo['article_serial']]); ?>')"
                            href="javascript:;">
                            <i class="layui-icon">&#xe63c;</i>编辑
                        </a>
                        <?php endif; ?>
                        <a title="预览" class="layui-btn layui-btn-xs layui-btn-normal" style="display:block;margin-left: 0;margin-top: 2px;"
                            onclick="x_admin_show('文章预览','<?php echo url('admin/article/articlepreview',['number'=>$vo['article_serial']]); ?>')"
                            href="javascript:;">
                            <i class="fa fa-eye"></i>预览
                        </a>
                        <?php if($vo['article_sign'] == 0): ?>
                        <a title="删除" class="layui-btn layui-btn-danger layui-btn-xs" style="display:block;margin-left: 0;margin-top: 2px;"
                            onclick="member_del(this,<?php echo $vo['id']; ?>)" href="javascript:;">
                            <i class="layui-icon">&#xe640;</i>删除
                        </a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "暂时没有数据哦!" ;endif; ?>
            </tbody>
        </table>
        <div class="page">
            <?php echo $article['page']; ?>
        </div>

    </div>
    <script>
        layui.use(['laydate', 'form'], function () {
            $ = layui.jquery;
            var laydate = layui.laydate;
            var form = layui.form
                , layer = layui.layer;

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
        function member_del(obj, id) {
            layer.confirm('要删除文章么?', function (index) {
                $.ajax({
                    type: 'post'
                    , dataType: 'json'
                    , url: "<?php echo url('admin/article/articleRecycleBin'); ?>"
                    , data: { 'id': id }
                    , success: function (response) {
                        $(obj).parents("tr").remove();
                        layer.msg(response, { icon: 1, time: 500 });
                    }
                });
            });
        }
        function delAll(argument) {
            var data = tableCheck.getData();
            if (data.length == 0) return false;
            layer.confirm('确认要删除吗？', function (index) {
                $.ajax({
                    type: 'post'
                    , dataType: 'json'
                    , url: "<?php echo url('admin/article/articleRecycleBin'); ?>"
                    , data: { 'id': data }
                    , success: function (response) {
                        layer.msg(response, { icon: 1, time: 500 });
                        $(".layui-form-checked").not('.header').parents('tr').remove();
                    }
                });
            });
        }
    </script>
    <script>
        $('.article-img').zoomify();
        function articleSignOnOff(id) {
            var aId = id;
            $.ajax({
                type: 'post'
                , dataType: 'json'
                , url: "<?php echo url('admin/article/articleSign'); ?>"
                , data: { 'id': aId }
                , success: function (response) {
                    layer.msg(response, { icon: 7, time: 1000 });
                }
            });
        }
        function articleSort(val, id) {
            $.ajax({
                type: 'post'
                , data: { 'sort': val, 'id': id }
                , dataType: 'json'
                , url: "<?php echo url('admin/article/articleSort'); ?>"
                , success: function (response) {
                    layer.msg(response, { icon: 7, time: 500 });
                }
            });
        }
    </script>
</body>

</html>