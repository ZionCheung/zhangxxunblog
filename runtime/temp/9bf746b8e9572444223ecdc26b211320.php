<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"E:\www\zhangxxunblog\public/../application/index\view\home\study.html";i:1539069780;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>学海无涯_zhangxxun</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/static/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/static/css/public.css" />
    <link rel="stylesheet" href="/static/css/study.css" />
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

<body class="blog-box study-body">
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
    <!-- study header -->
    <header class="study-header">
        <div class="container">
            <div class="row">
                <div class="study-nav col-sm-12">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="<?php echo url('index/index/index'); ?>">
                                    <img src="/static/images/study-logo.png" alt="">
                                </a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
                                    <li <?php if($cate['id'] == 2): ?>class="active" <?php endif; ?>> <a href="<?php echo url($cate['cate_link']); ?>"><?php echo $cate['cate_name']; ?></a>
                                    </li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
                <div class="header-say col-sm-12">
                    <div class="say-text col-sm-6">
                        <h4>我需要三件东西：爱情友谊和图书。然而这 三者之间何其相通！炽热的爱情可以充实图 书的内容，图书又是人们最忠实的朋友.</h4>
                        <p>--蒙田</p>
                    </div>
                    <div class="say-img col-sm-6">
                        <img src="/static/images/study.png" alt="">
                    </div>
                </div>
                <div class="header-line col-sm-12"></div>
            </div>
        </div>
    </header>
    <!-- study content -->
    <section class="study-box">
        <div class="container">
            <div class="row">
                <article class="article-box col-sm-12">
                    <div class="article-header">
                        <img src="/static/images/heart-article-f.png" alt="">
                    </div>
                    <!-- study fore-end -->
                    <div class="article-li">
                        <div class="li-img">
                            <!-- <h1>前端开发</h1> -->
                        </div>
                        <div class="li-text">
                            <h2>最新文章</h2>
                            <ul class="text-list">
                                <!-- fore-end li -->
                                <?php if(is_array($homeArticle) || $homeArticle instanceof \think\Collection || $homeArticle instanceof \think\Paginator): $i = 0; $__LIST__ = $homeArticle;if( count($__LIST__)==0 ) : echo "暂时没有数据哦" ;else: foreach($__LIST__ as $key=>$nose): $mod = ($i % 2 );++$i;?>
                                <li>
                                    <a href="<?php echo url('index/details/details',['cate'=>'nose','serial' => $nose['article_serial'].$nose['id']]); ?>"><?php echo $nose['article_name']; ?></a>
                                    <span><?php echo date("Y-m-d",$nose['article_time']); ?></span>
                                </li>
                                <?php endforeach; endif; else: echo "暂时没有数据哦" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- study back-end -->
                    <div class="article-li">
                        <div class="li-text">
                            <div class="li-img-h-top">
                                <!-- <h1>后端开发</h1> -->
                            </div>
                            <h2>最新文章</h2>
                            <ul class="text-list">
                                <!-- back-end li -->
                                <?php if(is_array($backArticle) || $backArticle instanceof \think\Collection || $backArticle instanceof \think\Paginator): $i = 0; $__LIST__ = $backArticle;if( count($__LIST__)==0 ) : echo "暂时没有数据哦" ;else: foreach($__LIST__ as $key=>$backend): $mod = ($i % 2 );++$i;?>
                                <li>
                                    <a href="<?php echo url('index/details/details',['cate'=>'backend','serial' => $backend['article_serial'].$backend['id']]); ?>"><?php echo $backend['article_name']; ?></a>
                                    <span><?php echo date("Y-m-d",$backend['article_time']); ?></span>
                                </li>
                                <?php endforeach; endif; else: echo "暂时没有数据哦" ;endif; ?>
                            </ul>
                        </div>
                        <div class="li-img-h">
                            <!-- <h1>后端开发</h1> -->
                        </div>
                    </div>
                    <!-- study servicer -->
                    <div class="article-li">
                        <div class="li-img-f">
                            <!-- <h1>其他</h1> -->
                        </div>
                        <div class="li-text">
                            <h2>最新文章</h2>
                            <ul class="text-list">
                                <!-- back-end li -->
                                <?php if(is_array($otherArticle) || $otherArticle instanceof \think\Collection || $otherArticle instanceof \think\Paginator): $i = 0; $__LIST__ = $otherArticle;if( count($__LIST__)==0 ) : echo "暂时没有数据哦" ;else: foreach($__LIST__ as $key=>$other): $mod = ($i % 2 );++$i;?>
                                <li>
                                    <a href="<?php echo url('index/details/details',['cate'=>'other','serial' => $other['article_serial'].$other['id']]); ?>"><?php echo $other['article_name']; ?></a>
                                    <span><?php echo date("Y-m-d",$other['article_time']); ?></span>
                                </li>
                                <?php endforeach; endif; else: echo "暂时没有数据哦" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="acticle-more">
                        <a href="<?php echo url('index/aclemore/aclemore'); ?>">查看更多...</a>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <footer class="study-footer">
        <div class="container">
            <div class="row">
                <div class="study-bottom col-sm-12">
                    <div class="footer-contact">
                        <a>
                            <i class="fa fa-qq" style="margin-right: 8px;"></i>939129894</a>
                        <a>
                            <i class="fa fa-weixin" style="margin-right: 8px;"></i>zhangxunxun957loveme</a>
                        <a>
                            <i class="fa fa-envelope-o" style="margin-right: 8px;"></i>zhangxunxun957@outlook.com</a>
                    </div>
                    <div class="footer-thank">
                        <a href="">感谢您的访问(我有话要说)!</a>
                    </div>
                    <div class="footer-record">
                        <p>2018.8 | ZhangXxun_v2.0</p>
                        <p>蜀ICP备18020042号-1</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="/static/js/bootstrap.min.js"></script>
</body>

</html>