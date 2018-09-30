<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"E:\www\zhangxxunblog\public/../application/admin\view\admin\home.html";i:1538103087;s:62:"E:\www\zhangxxunblog\application\admin\view\public\header.html";i:1537885663;}*/ ?>
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
    <div class="x-body layui-anim">
        <blockquote class="layui-elem-quote">欢迎管理员：
            <span class="x-red"><?php echo $name; ?></span>！当前时间:<b id="webtime" style="color:#009688;">正在获取当前时间</b></blockquote>
        <fieldset class="layui-elem-field">
            <legend>数据统计</legend>
            <div class="layui-field-box">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body">
                            <div class="layui-carousel x-admin-carousel x-admin-backlog" lay-anim="" lay-indicator="inside"
                                lay-arrow="none" style="width: 100%; height: 90px;">
                                <div carousel-item="">
                                    <ul class="layui-row layui-col-space10 layui-this">
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>文章数</h3>
                                                <p>
                                                    <cite>66</cite>
                                                </p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>会员数</h3>
                                                <p>
                                                    <cite>12</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>回复数</h3>
                                                <p>
                                                    <cite>99</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>商品数</h3>
                                                <p>
                                                    <cite>67</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>文章数</h3>
                                                <p>
                                                    <cite>67</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>文章数</h3>
                                                <p>
                                                    <cite>6766</cite></p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>系统通知</legend>
            <div class="layui-field-box">
                <table class="layui-table" lay-skin="line">
                    <tbody>
                        <tr>
                            <td>
                                <a class="x-a">zhangxxun_v2.0版本上线</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="x-a" href="http://wpa.qq.com/msgrd?v=3&uin=939129894&site=qq&menu=yes" target="_blank">开发者QQ(939129894)
                                    点击联系
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>系统信息/服务器信息</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                        <tr>
                            <th>zhangxxun版本</th>
                            <td><?php echo $homeInfo['versionNum']; ?></td>
                        </tr>
                        <tr>
                            <th>后台开发工具</th>
                            <td><?php echo $homeInfo['serverTool']; ?></td>
                        </tr>
                        <tr>
                            <th>服务器地址</th>
                            <td><?php echo $homeInfo['serverAddr']; ?></td>
                        </tr>
                        <tr>
                            <th>操作系统</th>
                            <td><?php echo $homeInfo['serverOs']; ?></td>
                        </tr>
                        <tr>
                            <th>运行环境</th>
                            <td><?php echo $homeInfo['serverEsce']; ?></td>
                        </tr>
                        <tr>
                            <th>开发工具版本</th>
                            <td><?php echo $homeInfo['serverPhp']; ?></td>
                        </tr>
                        <tr>
                            <th>开发工具运行方式</th>
                            <td><?php echo $homeInfo['serverFunc']; ?></td>
                        </tr>
                        <tr>
                            <th>数据库类型</th>
                            <td><?php echo $homeInfo['serverSqlTool']; ?></td>
                        </tr>
                        <tr>
                            <th>数据库版本</th>
                            <td><?php echo $homeInfo['serverMysql']; ?></td>
                        </tr>
                        <tr>
                            <th>后台框架/版本</th>
                            <td><?php echo $homeInfo['serverThink']; ?></td>
                        </tr>
                        <tr>
                            <th>当前时区</th>
                            <td><?php echo $homeInfo['serverTime']; ?></td>
                        </tr>
                        <tr>
                            <th>最大上传限制</th>
                            <td><?php echo $homeInfo['serverUpSize']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>开发信息</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                        <tr>
                            <th>开发者</th>
                            <td><?php echo $homeInfo['author']; ?></td>
                        </tr>
                        <tr>
                            <th>上线时间</th>
                            <td><?php echo $homeInfo['upTime']; ?></td>
                        </tr>
                        <tr>
                            <th>开发者寄语</th>
                            <td><?php echo $homeInfo['authorMeg']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
    </div>
    <script src="/static/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        $(function () {
            function currentTime() {
                var authorMsg;
                var d = new Date();
                var ctimeY = d.getFullYear();
                var ctimeMth = d.getMonth() + 1;
                var ctimeD = d.getDate();
                var ctimeDay = d.getDay();
                switch (ctimeDay) {
                    case 0:
                        ctimeDay = '星期日';
                        break;
                    case 1:
                        ctimeDay = '星期一';
                        break;
                    case 2:
                        ctimeDay = '星期二';
                        break;
                    case 3:
                        ctimeDay = '星期三';
                        break;
                    case 4:
                        ctimeDay = '星期四';
                        break;
                    case 5:
                        ctimeDay = '星期五';
                        break;
                    case 6:
                        ctimeDay = '星期六';
                        break;
                }
                var ctimeH = d.getHours();
                switch (ctimeH) {
                    case (ctimeH < 5):
                    case 22:
                    case 23:
                    case 24:
                        authorMsg = '深夜了,早点休息吧!';
                        break;
                    case 6:
                    case 7:
                    case 8:
                    case 9:
                    case 10:
                        authorMsg = '早上好,愿你有幸福的一天!';
                        break;
                    case 11:
                    case 12:
                    case 13:
                    case 14:
                        authorMsg = '中午好,今天吃啥呢!';
                        break;
                    case 15:
                    case 16:
                    case 17:
                    case 18:
                        authorMsg = '下午好,时间匆匆如流水!';
                        break;
                    default:
                        authorMsg = '晚上好,愿你的勤奋得到应有的回报!';
                        break;
                }
                var ctimeM = d.getMinutes();
                var ctimeS = d.getSeconds();
                (ctimeH < 10) ? ctimeH = '0' + ctimeH : ctimeH;
                (ctimeM < 10) ? ctimeM = '0' + ctimeM : ctimeM;
                (ctimeS < 10) ? ctimeS = '0' + ctimeS : ctimeS;
                ctime = ctimeY + '-' + ctimeMth + '-' + ctimeD + ' ' + ctimeH + ':' + ctimeM + ':' + ctimeS + '  ' + ctimeDay + '  ' + authorMsg;
                return ctime;
            }
            setInterval(function () {
                $("#webtime").html(currentTime)
            }, 1000);
        });
    </script>
</body>

</html>