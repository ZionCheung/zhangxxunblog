<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"E:\www\zhangxxunblog\public/../application/index\view\home\heart.html";i:1539744332;s:63:"E:\www\zhangxxunblog\application\index\view\public\message.html";i:1539744855;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/static/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/static/css/swiper-4.3.3.min.css" />
    <link rel="stylesheet" href="/static/css/public.css" />
    <link rel="stylesheet" href="/static/css/heart.css" />
    <script src="/static/js/jquery-3.3.1.min.js"></script>
    <title>心灵鸡汤_zhangxxun</title>
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

<body class="heart-body">
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
    <!-- heart start -->
    <header class="heart-header">
        <div class="container">
            <div class="row">
                <div class="header-nav col-sm-12">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="<?php echo url('index/index/index'); ?>">
                                    <img src="/static/images/logo.png" alt="">
                                </a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
                                    <li <?php if($cate['id'] == 3): ?>class="active" <?php endif; ?>> <a href="<?php echo url($cate['cate_link']); ?>"><?php echo $cate['cate_name']; ?></a>
                                    </li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- heart banner -->
    <section class="heart-banner">
        <div class="container">
            <div class="row">
                <div class="banner-box col-sm-12">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "暂时没有数据哦" ;else: foreach($__LIST__ as $key=>$heartBanner): $mod = ($i % 2 );++$i;?>
                            <div class="swiper-slide">
                                <a href="<?php echo $heartBanner['banner_link']; ?>">
                                    <img src="<?php echo $heartBanner['banner_route']; ?>" alt="<?php echo $heartBanner['banner_desc']; ?>">
                                </a>
                            </div>
                            <?php endforeach; endif; else: echo "暂时没有数据哦" ;endif; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- content list -->
    <section class="heart-article">
        <div class="container">
            <div class="row">
                <div class="article-box col-sm-12">
                    <!-- content header -->
                    <div class="box-header">
                        <img src="/static/images/heart-article.png" alt="">
                    </div>
                    <!-- content box -->
                    <div class="box-content">
                        <!-- content li -->
                        <?php if(is_array($article) || $article instanceof \think\Collection || $article instanceof \think\Paginator): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "暂时没有数据哦" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?>
                        <div class="content">
                            <div class="content-img">
                                <a href="<?php echo url('index/details/details',['cate'=>'heart','serial' => $article['article_serial'].$article['id']]); ?>"><img
                                        src="/static/upload/article/thumb/<?php echo $article['article_cover']; ?>" alt=""></a>
                            </div>
                            <div class="content-label">
                                <p class="label-time"><i class="fa fa-calendar aclebox-icon-blue"></i><?php echo date("Y-m-d",$article['article_time']); ?></p>
                                <p class="label-heart"><i class="fa fa-heart aclebox-icon-red"></i>喜欢(<?php echo $article['article_like']; ?>)</p>
                            </div>
                            <div class="content-title">
                                <a href="<?php echo url('index/details/details',['cate'=>'heart','serial' => $article['article_serial'].$article['id']]); ?>">
                                    <h4 title="<?php echo $article['article_name']; ?>"><?php echo $article['article_name']; ?></h4>
                                </a>
                                <p><?php echo $article['introduction']; ?></p>
                            </div>
                            <div class="content-detailed">
                                <a href="<?php echo url('index/details/details',['cate'=>'heart','serial' => $article['article_serial'].$article['id']]); ?>">查看全文>>></a>
                            </div>
                        </div>
                        <?php endforeach; endif; else: echo "暂时没有数据哦" ;endif; ?>
                        <!-- heart page -->
                        <div class="heart-page">
                            <?php echo $page; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="heart-bottom">
        <div class="container">
            <div class="row">
                <div class="heart-footer col-sm-12">
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
                </div>
            </div>
        </div>
    </footer>
    <script src="/static/js/bootstrap.min.js"></script>
    <script src="/static/js/swiper-4.3.3.min.js"></script>
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
    <script type="text/javascript">
        var swiper = new Swiper('.swiper-container', {
            pagination: {
                el: '.swiper-pagination',
                dynamicBullets: true,
            },
            autoplay: {
                delay: 6000,
                stopOnLastSlide: false,
                disableOnInteraction: true,
            },
        });
    </script>
</body>

</html>