<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"E:\www\zhangxxunblog\public/../application/index\view\home\index.html";i:1539744218;s:63:"E:\www\zhangxxunblog\application\index\view\public\message.html";i:1539744855;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>首页_zhangxxun</title>
	<link rel="stylesheet" href="/static/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/static/css/public.css" />
	<link rel="stylesheet" href="/static/css/index.css" />
	<link rel="stylesheet" href="/static/css/swiper-4.3.3.min.css" />
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
					<img src="/static/images/logo.png" alt="">
				</div>
			</div>
		</div>
	</header>
	<!-- primary coverage -->
	<section class="content">
		<div class="container">
			<div class="row">
				<!-- content left -->
				<div class="coverage-left col-md-8">
					<!-- conent banner img -->
					<div class="coverleft-banner">
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<?php if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "暂时没有轮播哦" ;else: foreach($__LIST__ as $key=>$banner): $mod = ($i % 2 );++$i;?>
								<div class="swiper-slide">
									<a href="<?php echo $banner['banner_link']; ?>">
										<img src="<?php echo $banner['banner_route']; ?>" alt="">
									</a>
								</div>
								<?php endforeach; endif; else: echo "暂时没有轮播哦" ;endif; ?>
							</div>
							<div class="swiper-pagination"></div>
						</div>
					</div>
					<!-- content navbar -->
					<div class="coverleft-nav">
						<nav class="navbar navbar-default">
							<div class="container-fluid">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
									 aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
									<a class="navbar-brand" href="<?php echo url('index/index/index'); ?>">zhangxxun</a>
								</div>
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<ul class="nav navbar-nav navbar-right">
										<?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
										<li <?php if($vo['id'] == 1): ?>class="active" <?php endif; ?>> <a href="<?php echo url($vo['cate_link']); ?>"><?php echo $vo['cate_name']; ?></a>
										</li>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</ul>
								</div>
							</div>
						</nav>
					</div>
					<!-- article box -->
					<article class="article">
						<?php if(is_array($article) || $article instanceof \think\Collection || $article instanceof \think\Paginator): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "暂时没有文章哦!" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?>
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
											<h4 title=""><?php echo $article['article_name']; ?></h4>
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
									<div class="text-more">
										<a href="<?php echo url('index/details/details',['cate'=>$article['cate']['cate_english_name'],'serial' => $article['article_serial'].$article['id']]); ?>"
										 class="article-more">全文查看>>></a>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; endif; else: echo "暂时没有文章哦!" ;endif; ?>
					</article>
					<div class="coverage-left-footer">
						<a href="<?php echo url('index/aclemore/aclemore'); ?>">
							<b>查看更多>>></b>
						</a>
					</div>
				</div>
				<!-- content right -->
				<div class="coverage-right col-md-4">
					<!-- content right  recommend-->
					<div class="recommend">
						<div class="recommend-title">
							<h3>本站推荐</h3>
						</div>
						<!-- recommend block  -->
						<?php if(is_array($recommend) || $recommend instanceof \think\Collection || $recommend instanceof \think\Paginator): $i = 0; $__LIST__ = $recommend;if( count($__LIST__)==0 ) : echo "当前没有推荐" ;else: foreach($__LIST__ as $key=>$recommend): $mod = ($i % 2 );++$i;?>
						<div class="recommend-block">
							<a href="<?php echo url('index/details/details',['cate'=>'recommend','serial' => $recommend['serial'].$recommend['id']]); ?>"
							 class="block-img">
								<img src="/static/upload/article/thumb/<?php echo $recommend['cover']; ?>" alt="">
							</a>
							<div class="recimg-title">
								<h4>本站推荐</h4>
							</div>
							<div class="recimg-text">
								<h4><?php echo $recommend['name']; ?></h4>
							</div>
						</div>
						<?php endforeach; endif; else: echo "当前没有推荐" ;endif; ?>
					</div>
					<!-- content right  label-->
					<div class="coveright-label">
						<h3 class="label-top">标签</h3>
						<ul class="label-list">
							<?php if(is_array($tags) || $tags instanceof \think\Collection || $tags instanceof \think\Paginator): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "暂时没有标签" ;else: foreach($__LIST__ as $key=>$tags): $mod = ($i % 2 );++$i;?>
							<a href="<?php echo url('index/aclemore/aclemore',['tags'=>$tags['id']]); ?>">
								<li style="background-color:<?php echo $tags['tags_color']; ?>">
									<h3><?php echo $tags['tags_title']; ?></h3>
								</li>
								<div class="list-line"></div>
							</a>
							<?php endforeach; endif; else: echo "暂时没有标签" ;endif; ?>
						</ul>
					</div>
					<!-- content right  aboutme-->
					<div class="coveright-about">
						<div class="about-wall"></div>
						<div class="about-content">
							<div class="about-name">
								<h3 class="chinese-name">周维庆</h3>
								<h3 class="english-name">ZionCheung</h3>
							</div>
							<div class="about-ability">
								<ul class="ability-list">
									<li>Web前端开发</li>
									<li>Php后台开发</li>
									<li>Photoshop图像处理</li>
									<li>Flash动画处理</li>
								</ul>
							</div>
							<div class="ability-introduction">
								<p>一个90后男青年,现居于重庆,16年计算机专业毕业后,致力于网页开发技术,对WEB开发兴趣浓厚,以致于终日代码为伴,憧憬着成为一位不折不扣的程序员。</p>
							</div>
						</div>
						<div class="about-head">
							<img src="/static/images/mehead-2.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- optimization -->
	<div class="optimization">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="option-header">
						<h3>优选</h3>
					</div>
					<div class="option-box">
						<!-- optimization box -->
						<?php if(is_array($optimization) || $optimization instanceof \think\Collection || $optimization instanceof \think\Paginator): $i = 0; $__LIST__ = $optimization;if( count($__LIST__)==0 ) : echo "暂时没有数据哦" ;else: foreach($__LIST__ as $key=>$option): $mod = ($i % 2 );++$i;?>
						<div class="option-img col-sm-3">
							<a href="" class="img-href">
								<img src="/static/upload/article/thumb/<?php echo $option['article_cover']; ?>" alt="">
							</a>
							<a class="img-rectangle" href="<?php echo url('index/details/details',['cate'=>'optimization','serial' => $option['article_serial'].$option['id']]); ?>">
								<h4><?php echo $option['article_name']; ?></h4>
							</a>
							<div class="img-line-left">
								<i class="left"></i>
							</div>
							<div class="img-line-right">
								<i class="right"></i>
							</div>
							<div class="img-line-top">
								<i class="top"></i>
							</div>
							<div class="img-line-bottom">
								<i class="bottom"></i>
							</div>
						</div>
						<?php endforeach; endif; else: echo "暂时没有数据哦" ;endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- index-footer -->
	<footer class="index-footer">
		<div class="footer-contact">
			<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=939129894&site=qq&menu=yes">
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
				delay: 3000,
				stopOnLastSlide: false,
				disableOnInteraction: true,
			},
		});
	</script>
	<script>(function (T, h, i, n, k, P, a, g, e) { g = function () { P = h.createElement(i); a = h.getElementsByTagName(i)[0]; P.src = k; P.charset = "utf-8"; P.async = 1; a.parentNode.insertBefore(P, a) }; T["ThinkPageWeatherWidgetObject"] = n; T[n] || (T[n] = function () { (T[n].q = T[n].q || []).push(arguments) }); T[n].l = +new Date(); if (T.attachEvent) { T.attachEvent("onload", g) } else { T.addEventListener("load", g, false) } }(window, document, "script", "tpwidget", "//widget.seniverse.com/widget/chameleon.js"))</script>
	<script>tpwidget("init", {
			"flavor": "bubble",
			"location": "WX4FBXXFKE4F",
			"geolocation": "enabled",
			"position": "top-left",
			"margin": "10px 10px",
			"language": "zh-chs",
			"unit": "c",
			"theme": "chameleon",
			"uid": "UB864F5EDC",
			"hash": "7e7f55d4945d31971ac8c7843412d8d3"
		});
		tpwidget("show");</script>
</body>

</html>