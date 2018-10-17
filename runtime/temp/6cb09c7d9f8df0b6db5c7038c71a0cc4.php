<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"E:\www\zhangxxunblog\public/../application/index\view\home\aclemore.html";i:1539744883;s:63:"E:\www\zhangxxunblog\application\index\view\public\message.html";i:1539744855;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>查看更多_zhangxxun</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/static/css/public.css" />
    <link rel="stylesheet" href="/static/css/aclemore.css" />
    <link rel="stylesheet" href="/static/css/font-awesome.min.css" />
    <script src="/static/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        window.onload = function () {
            var img = $('img');
            var num = 0;
            if (img.length == 0) {
                $('.loadhtml').fadeOut();
            } else {
                img.each(function (i) {
                    var objImg = new Image();
                    objImg.onload = function () {
                        num++;
                        if (num >= i) {
                            $('.loadhtml').fadeOut();
                        }
                    }
                    objImg.src = img[i].src;
                });
            }
        }
    </script>
</head>

<body class="blog-box">
    <!-- Load -->
    <div class="loadhtml" id="load">
        <div class="spinner">
            <div class="spinner-container container1">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
            <div class="spinner-container container2">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
            <div class="spinner-container container3">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
        </div>
    </div>
    <!-- top blog welcome -->
    <header class="header-welcome">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a href="<?php echo url('index/index/index'); ?>">
                        <img src="/static/images/logo.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <!-- content header -->
                <div class="header-search col-sm-12">
                    <div class="search">
                        <form action="<?php echo url('index/aclemore/aclemore'); ?>" method="GET">
                            <input type="text" class="search-text" name="key" autocomplete="off" placeholder="请输入搜索内容">
                            <button type="submit" class="search-btn">全站查找</button>
                        </form>
                        <p>本站共有<b><?php echo $articleTotal; ?></b>篇文章,当前搜索共有<b><?php echo $articleCurrent; ?></b>个结果!</p>
                    </div>
                </div>
                <!-- content article -->
                <div class="aclemore-content col-sm-12">
                    <!-- article list -->
                    <?php if(is_array($article) || $article instanceof \think\Collection || $article instanceof \think\Paginator): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "暂时没有数据哦" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?>
                    <div class="article-box">
                        <div class="row">
                            <div class="aclebox-left col-sm-4">
                                <a href="<?php echo url('index/details/details',['cate'=>$article['cate']['cate_english_name'],'serial' => $article['article_serial'].$article['id']]); ?>"
                                    class="article-img">
                                    <img src="/static/upload/article/thumb/<?php echo $article['article_cover']; ?>" alt="">
                                </a>
                            </div>
                            <div class="aclebox-right col-sm-8">
                                <div class="header-label">
                                    <a class="label-title" href="<?php echo url('index/aclemore/aclemore',['articleCate'=>$article['cate']['id']]); ?>"><?php echo $article['cate']['cate_name']; ?></a>
                                    <img src="/static/images/header-label.png" alt="">
                                </div>
                                <div class="article-text">
                                    <a href="<?php echo url('index/details/details',['cate'=>$article['cate']['cate_english_name'],'serial' => $article['article_serial'].$article['id']]); ?>"
                                        class="article-title">
                                        <h4 title="<?php echo $article['article_name']; ?>"><?php echo $article['article_name']; ?></h4>
                                    </a>
                                </div>
                                <div class="article-content">
                                    <p class="content-text"><?php echo $article['introduction']; ?></p>
                                </div>
                            </div>
                            <div class="aclebox-footer col-sm-12">
                                <div class="icon-left">
                                    <i class="fa fa-calendar aclebox-icon-blue"></i>
                                    <span><?php echo date("Y-m-d",$article['article_time']); ?></span>
                                    <i class="fa fa-eye aclebox-icon"></i>
                                    <span>查看(
                                        <b><?php echo $article['article_click']; ?></b>)次</span>
                                    <i class="fa fa-heart aclebox-icon-red"></i>
                                    <span>喜欢(
                                        <b><?php echo $article['article_like']; ?></b>)</span>
                                </div>
                                <div class="icon-left">
                                    <?php if(is_array($article['tags']) || $article['tags'] instanceof \think\Collection || $article['tags'] instanceof \think\Paginator): $i = 0; $__LIST__ = $article['tags'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tags): $mod = ($i % 2 );++$i;?>
                                    <i class="fa fa-tags" style="color:#337ab7"></i>
                                    <span style="color:#337ab7"><?php echo $tags['tags_title']; ?></span>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                                <div class="text-more">
                                    <a href="<?php echo url('index/details/details',['cate'=>$article['cate']['cate_english_name'],'serial' => $article['article_serial'].$article['id']]); ?>"
                                        class="article-more">全文查看>>></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; else: echo "暂时没有数据哦" ;endif; ?>
                    <div class="pagebox">
                        <?php echo $page; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- index-footer -->
    <footer class="index-footer">
        <div class="footer-contact">
            <a>
                <i class="fa fa-qq" style="margin-right: 8px;"></i>939129894</a>
            <a>
                <i class="fa fa-weixin" style="margin-right: 8px;"></i>zhangxunxun957loveme</a>
            <a>
                <i class="fa fa-envelope-o" style="margin-right: 8px;"></i>zhangxunxun1314@outlook.com</a>
        </div>
        <div class="footer-thank">
            <a onclick="openMessage()">感谢您的访问(我有话要说)!</a>
        </div>
        <div class="footer-record">
            <p>2018.8 | ZhangXxun_v2.0</p>
            <a href="http://www.miitbeian.gov.cn" target="_black">蜀ICP备18020042号-1</a>
        </div>
    </footer>
    <script src="/static/js/bootstrap.min.js"></script>
    <div id="message">
    <div class="mge-input">
        <div class="mge-title">
            <h3>给我留言</h3>
        </div>
        <div class="mge-content">
            <div class="form-group">
                <label for="" style="color:#fff;">联系方式</label>
                <input type="text" class="form-control" id="mgeContact" autocomplete="off" placeholder="请输入您的QQ/微信/邮箱">
            </div>
            <label for="" style="color:#fff;">留言内容</label>
            <textarea class="form-control" id="mgeContent" rows="12" placeholder="请输入留言内容100字左右"></textarea>
        </div>
        <div class="mge-button">
            <button class="btn btn-success" onclick="sbtMessage()">确认留言</button>
            <button class="btn btn-danger" onclick="closeMessage()">我点错了</button>
        </div>
    </div>
</div>
<script type="text/javascript">
    function openMessage() {
        var mgeWidth = $(document.body).width();
        var mgeHeight = $(document.body).height();
        $('#message').css('width', mgeWidth);
        $('#message').css('height', mgeHeight + 100);
        var winWidth = $(window).width();
        var winHeight = $(window).height();
        var scrollTop = $(document).scrollTop();
        var scrollLeft = $(document).scrollLeft();
        var divWidth = $('.mge-input').width();
        var divHeight = $('.mge-input').height();
        var dleft = ((winWidth - divWidth) / 2) + scrollLeft;
        var dtop = ((winHeight - divHeight) / 2) + scrollTop;
        $('.mge-input').animate({
            left: dleft,
            top: dtop
        }, 400);
    }
    function closeMessage() {
        $('#message').animate({
            width: 0
            , height: 0
        }, 200);
        $('.mge-input').animate({
            left: '-600px'
            , top: '-200px'
        }, 200);
    }
    function sbtMessage() {
        var contact = $('#mgeContact').val();
        var content = $('#mgeContent').val();
        if (contact.length == 0 || content.length == 0) return false;
        $.ajax({
            type: 'post'
            , dataType: 'json'
            , url: "<?php echo url('index/aboutme/addMessage'); ?>"
            , data: { 'contact': contact, 'content': content }
            , success: function (response) {
                zx_alert(response);
                $('#message').animate({
                    width: 0
                    , height: 0
                }, 200);
                $('.mge-input').animate({
                    left: '-600px'
                    , top: '-200px'
                }, 200);
            }
        });
    }
    function zx_alert(e) {
        $("body").append('<div id="msg"><div class="" id="msg_top">温馨提示<span class="msg_close">×</span></div><div id="msg_cont">' + e + '</div><div class="msg_close" id="msg_clear">确定</div></div>');
        $(".msg_close").click(function () {
            $("#msg").remove();
        });
    }
</script>
</body>

</html>