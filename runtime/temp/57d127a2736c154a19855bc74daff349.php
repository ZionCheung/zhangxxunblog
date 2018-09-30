<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"E:\www\zhangxxunblog\public/../application/index\view\home\details.html";i:1538106710;}*/ ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $article['article_name']; ?>_zhangxxun</title>
	<link rel="stylesheet" href="/static/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/static/css/public.css" />
	<link rel="stylesheet" href="/static/css/details.css" />
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

<body class="blog-box details-body">
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
					<a href="<?php echo url('index/index/index'); ?>"><img src="/static/images/logo.png" alt=""></a>
				</div>
			</div>
		</div>
	</header>
	<!-- alticle content -->
	<section class="content">
		<div class="container">
			<div class="row">
				<div class="alticle col-sm-12">
					<div class="alticle-img">
						<img src="/static/upload/article/original/<?php echo $article['article_cover']; ?>" alt="">
						<div class="alticle-title">
							<h3><?php echo $article['article_name']; ?></h3>
						</div>
					</div>
					<div class="alticle-content">
						<?php echo $article['article_content']; ?>
					</div>
					<div class="alticle-end">
						<h2>End</h2>
					</div>
					<div class="alticle-label">
						<h4 style="color: #009966">Label</h4>
						<?php if(is_array($tags) || $tags instanceof \think\Collection || $tags instanceof \think\Paginator): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tags): $mod = ($i % 2 );++$i;if($tags['tags_sign'] == 1): ?>
						<a href='' class="label-bm">
							<span class="glyphicon glyphicon-tags" style="margin-right: 6px;"></span>
							<?php echo $tags['tags_title']; ?>
						</a>
						<?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<div class="alticle-operation">
						<input type="hidden" value="<?php echo $article['id']; ?>" id="aid">
						<ul class="alticle-list">
							<li><i class="fa fa-user aclebox-icon"></i><?php echo $article['article_author']; ?></li>
							<li><i class="fa fa-calendar aclebox-icon-blue"></i><?php echo date("Y-m-d",$article['article_time']); ?></li>
							<li><i class="fa fa-eye aclebox-icon"></i>阅读(<b><?php echo $article['article_click']; ?></b>)</li>
							<li style="cursor:pointer"><i class="fa fa-heart aclebox-icon-red"></i><a onclick="articleLike(<?php echo $article['id']; ?>)">我喜欢(<b
									 id="likeNum"><?php echo $article['article_like']; ?></b>)</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- comment list -->
	<div class="comment" style="display:none">
		<div class="container">
			<div class="row">
				<div class="comment-box col-sm-12">
					<!-- comment title -->
					<div class="comment-title">
						<h3>评论区(<b>666</b>)</h3>
					</div>
					<!-- comment input -->
					<div class="comment-text">
						<textarea name="" class="comment-content" rows="14" id="cmcontent" placeholder="来都来了,留下点什么吧!"></textarea>
						<div class="comment-btn">
							<div class="btn-look">
								<img src="/static/images/face/1.gif">
							</div>
							<a class="btn-comment" onclick="commentSub()">留言</a>
						</div>
					</div>
					<!-- comment contnet -->
					<div class="comment-exhibition" id="exhi">
						<!-- comment contnet li-->
						<div class="exhi-list">
							<div class="exhi-title">
								<img src="/static/images/6.jpg" alt="">
								<div class="exhi-text">
									<h4>zhangxxun <span style="color: #555">重庆重庆</span></h4>
									<p>2018.06.15 18:20:23<a href="">回复</a><a href=""><i class="fa fa-thumbs-o-up"></i>(<b style="color: #009966">666</b>)</a></p>
								</div>
							</div>
							<div class="exhi-mge">
								<p>写的很好,我很喜欢</p>
							</div>
						</div>
						<!-- comment contnet li-->
						<div class="exhi-list">
							<div class="exhi-title">
								<img src="/static/images/6.jpg" alt="">
								<div class="exhi-text">
									<h4>zhangxxun <span style="color: #555">重庆重庆</span></h4>
									<p>2018.06.15 18:20:23<a href="">回复</a><a href=""><i class="fa fa-thumbs-o-up"></i>(<b style="color: #009966">666</b>)</a></p>
								</div>
							</div>
							<div class="exhi-mge">
								<p>写的很好,我很喜欢</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--footer -->
	<footer class="index-footer">
		<div class="footer-contact">
			<a><i class="fa fa-qq" style="margin-right: 8px;"></i>939129894</a>
			<a><i class="fa fa-weixin" style="margin-right: 8px;"></i>zhangxunxun957loveme</a>
			<a><i class="fa fa-envelope-o" style="margin-right: 8px;"></i>zhangxunxun957@outlool.com</a>
		</div>
		<div class="footer-thank">
			<a href="">感谢您的访问(我有话要说)!</a>
		</div>
		<div class="footer-record">
			<p>2018.8 | ZhangXxun_v2.0</p>
			<p>蜀ICP备18020042号-1</p>
		</div>
	</footer>
	<script src="/static/js/bootstrap.min.js"></script>
	<script src="/static/js/jquery.qqFace.js"></script>
	<script type="text/javascript">
		// 初始化表情
		$(function () {
			$('.btn-look').qqFace({
				id: 'emoticon',
				assign: 'cmcontent',
				path: '/static/images/face/' //表情存放的路径
			});
		});
		// 点击添加留言
		function commentSub() {
			var textar = $('#cmcontent').val();
			if (textar.length == 0) {
				alert('留言内容不能为空!');
			} else {
				$('.exhi-list:last').after(
					'<div class="exhi-list"><div class="exhi-title"><img src="/static/images/6.jpg" alt=""><div class="exhi-text"><h4>zhangxxun <span style="color: #555">重庆重庆</span></h4><p>2018.06.15 18:20:23<a href="">回复</a><a href=""><i class="fa fa-thumbs-o-up"></i>(<b style="color: #009966">666</b>)</a></p></div></div><div class="exhi-mge"><p>' +
					replace_em(textar) + '</p></div></div>')
				$('#cmcontent').val('');
			}
		}
		// 匹配表情显示
		function replace_em(str) {
			str = str.replace(/\</g, '&lt;');
			str = str.replace(/\>/g, '&gt;');
			str = str.replace(/\n/g, '<br/>');
			str = str.replace(/\[em_([0-9]*)\]/g, '<img src="/static/images/face/$1.gif" border="0" />');
			return str;
		}
	</script>
	<script type="text/javascript">
		$(function () {
			var aid = $('#aid').val();
			$.ajax({
				type: 'post'
				, dataType: 'json'
				, url: "<?php echo url('index/details/articleClick'); ?>"
				, data: { 'aid': aid }
			});
		});
		function articleLike(data) {
			var aid = data;
			$.ajax({
				type: 'post'
				, dataType: 'json'
				, url: "<?php echo url('index/details/articleLike'); ?>"
				, data: { 'id': aid }
				, success: function (response) {
					if (response.errno == 0) {
						var like = parseInt($('#likeNum').html())+parseInt(1);
						$('#likeNum').html(like);
					} else {
						zx_alert(response);
					}
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