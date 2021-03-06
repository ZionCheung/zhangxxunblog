<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"E:\www\zhangxxunblog\public/../application/index\view\home\details.html";i:1539744496;s:63:"E:\www\zhangxxunblog\application\index\view\public\message.html";i:1539744601;}*/ ?>
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
						<a href="<?php echo url('index/aclemore/aclemore',['tags'=>$tags['tags_id']]); ?>" class="label-bm">
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
	<div class="comment">
		<div class="container">
			<div class="row">
				<div class="comment-box col-sm-12">
					<!-- comment title -->
					<div class="comment-title">
						<h3>评论区(<b><?php echo $comment['total']; ?></b>)</h3>
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
						<?php if(is_array($comment['data']) || $comment['data'] instanceof \think\Collection || $comment['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $comment['data'];if( count($__LIST__)==0 ) : echo "暂时还没有留言哦" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?>
						<div class="exhi-list">
							<div class="exhi-title">
								<img src="/static/images/admin.jpg" alt="">
								<div class="exhi-text">
									<h4><?php echo $comment['comment_name']; ?></h4>
									<p><?php echo date("Y.m.d H:i:s",$comment['comment_time']); ?>
										<a href="" style="display:none">回复</a>
										<a href="javascript:void(commentLike(<?php echo $comment['id']; ?>))">
											<i class="fa fa-thumbs-o-up"></i>(<b style="color: #009966" id="comLike_<?php echo $comment['id']; ?>"><?php echo $comment['comment_like']; ?></b>)
										</a>
									</p>
								</div>
							</div>
							<div class="exhi-mge">
								<p><?php echo $comment['content']; ?></p>
							</div>
						</div>
						<?php endforeach; endif; else: echo "暂时还没有留言哦" ;endif; ?>
						<div id="commentPage" style="text-align:center;padding: 2px 8px;">
							<?php echo $page; ?>
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
			<a><i class="fa fa-envelope-o" style="margin-right: 8px;"></i>zhangxunxun1314@outlook.com</a>
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
	<script src="/static/js/jquery.qqFace.js"></script>
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
		// 初始化表情
		$(function () {
			$('.btn-look').qqFace({
				id: 'emoticon',
				assign: 'cmcontent',
				path: '/static/images/face/' //表情存放的路径
			});
		});
		function commentLike(id) {
			$.ajax({
				type: 'post'
				, dataType: 'json'
				, url: "<?php echo url('index/details/articleCommentLike'); ?>"
				, data: { 'commentId': id }
				, success: function (response) {
					if (response.errno == 0) {
						var commentLike = parseInt($('#comLike_' + id).html()) + parseInt(1);
						$('#comLike_' + id).html(commentLike);
					} else {
						zx_alert(response);
					}
				}
			});
		}
		// 点击添加留言
		function commentSub() {
			var textar = $('#cmcontent').val();
			var articleId = <?php echo $article['id']; ?>;
			if (textar.length == 0) {
				zx_alert('留言内容不能为空!');
			} else {
				$.ajax({
					type: 'post'
					, dataType: 'json'
					, url: "<?php echo url('index/details/articleComment'); ?>"
					, data: { "content": textar, 'articleId': articleId }
					, success: function (response) {
						if (response.errno == 0) {
							zx_alert(response.mge);
							$('.exhi-list:last').after(
								'<div class="exhi-list"><div class="exhi-title"><img src="/static/images/admin.jpg" alt=""><div class="exhi-text"><h4>网友</h4><p>' + response.time + '<a href="" style="display:none">回复</a><a><i class="fa fa-thumbs-o-up"></i>(<b style="color: #009966">0</b>)</a></p></div></div><div class="exhi-mge"><p>' +
								replace_em(textar) + '</p></div></div>')
							$('#cmcontent').val('');
						}
					}
				});
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
						var like = parseInt($('#likeNum').html()) + parseInt(1);
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