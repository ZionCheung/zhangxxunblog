<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"E:\www\zhangxxunblog\public/../application/index\view\home\aboutme.html";i:1539237084;}*/ ?>
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
    <link rel="stylesheet" href="/static/css/aboutme.css" />
    <title>关于我_zhangxxun</title>
    <script src="/static/js/jquery-3.3.1.min.js "></script>
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

<body class="blog-box aboutme-body">
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
    <!-- nav -->
    <div class="aboutme-nav">
        <div class="nav-icon">
            <i class="fa fa-bars"></i>
        </div>
    </div>
    <div class="nav-list">
        <ul class="nav-ul">
            <a href="<?php echo url('index/index/index'); ?>">
                <li>网站首页</li>
            </a>
            <a href="<?php echo url('index/study/study'); ?>">
                <li>学海无涯</li>
            </a>
            <a href="<?php echo url('index/heart/heart'); ?>">
                <li>心灵鸡汤</li>
            </a>
            <a href="<?php echo url('index/noisylife/noisylife'); ?>">
                <li>喧嚣生活</li>
            </a>
            <a class="action">
                <li>关于我</li>
            </a>
            <a>
                <li>
                    <i class="li-close fa fa-times"></i>
                </li>
            </a>
        </ul>
    </div>
    <div class="aboutme">
        <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide aboutme-introduction" style="background-image: url('/static/images/aboutme-bg1.jpg')">
                    <section class="aboutme-cover">
                        <div class="container">
                            <div class="row">
                                <div class="cover-box col-sm-12">
                                    <div class="logo">
                                        <a href="<?php echo url('index/index/index'); ?>">
                                            <img src="/static/images/aboutmelogo.png" alt="">
                                        </a>
                                        <h3>2018</h3>
                                    </div>
                                    <div class="motto">
                                        <h3 class="motto-text">别人为食而生存，我为生存而食。</h3>
                                        <span>--苏格拉底</span>
                                    </div>
                                    <div class="aboutme-btn">
                                        <a id="mebtn">关于我</a>
                                        <a id="webbtn">关于本站</a>
                                    </div>
                                    <div class="down-icon">
                                        <a id="iconDown" title="查看更多">
                                            <i class="fa fa-angle-double-down"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="swiper-slide aboutme-resume" style="background-image: url('/static/images/aboutme-bg2.jpg')">
                    <section class="resume">
                        <div class="resume-box">
                            <div class="intion-title">
                                <h1>关于我</h1>
                                <span>(AboutMe)</span>
                            </div>
                            <div class="intion-content">
                                <p>我是周维庆,一个90后男青年,现居于重庆,16年计算机专业毕业后,致力于网页开发技术,对WEB开发兴趣浓厚,以致于终日代码为伴,憧憬着成为一位不折不扣的程序员。</p>
                                <p>曾经有着成为一位作家理想,不料为了生计最终落马成为一名程序猿,干一行爱一行,在工作及累积的过程中体会到了编程的魅力,为之深深着迷,现在看来这条路可能很长,也需要走的很久。</p>
                                <p>个子不高,身材不胖,相貌平平,话少心善,更没有在身上纹过小猪佩奇!</p>
                            </div>
                            <div class="intion-contact">
                                <div class="we-qr">
                                    <img src="/static/images/wx-QR.png" alt="">
                                    <span>微信二维码</span>
                                </div>
                                <div class="contact">
                                    <a href="">
                                        <i class="fa fa-qq"></i>
                                        <span>939129894</span>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-weixin"></i>
                                        <span>zhangxunxun957loveme</span>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-envelope-o"></i>
                                        <span>zhangxunxun1314@outlook.com</span>
                                        <span>|939129894@qq.com</span>
                                    </a>
                                    <a href="https://weibo.com/u/6018806697" target="_block">
                                        <i class="fa fa-weibo"></i>
                                        <span>https://weibo.com/u/6018806697</span>
                                    </a>
                                    <a href="" target="_block">
                                        <i class="fa fa-github"></i>
                                        <span>ZionCheung</span>
                                    </a>
                                    <div style="color:#000">
                                        <i class="fa fa-map-marker"></i>
                                        <span>重庆市渝北区</span>
                                    </div>
                                </div>
                            </div>
                            <div class="resume-line"></div>
                            <div class="resume-lineTwo"></div>
                            <div class="resume-header">
                            </div>
                        </div>
                        <div class="resume-form noroll">
                            <h3>给我留言</h3>
                            <div class="reform">
                                <label for="contact">联系方式</label>
                                <input type="text" name="contact" class="aboutme-contact">
                                <label for="">留言内容</label>
                                <textarea name="" rows="10" class="reform-text"></textarea>
                            </div>
                            <div class="subbtn">
                                <button class="btn">点击留言</button>
                            </div>
                            <div class="reline"></div>
                        </div>
                        <!-- max-width:768 -->
                        <div class="mresume-box">
                            <div class="mtitle">
                                <h3>关于我</h3>
                                <div class="maboutme"></div>
                            </div>
                            <div class="mtitletwo">
                                <h3>联系我</h3>
                                <div class="mcontact"></div>
                            </div>
                            <div class="maboutme-into">
                                <div class="into-close">
                                    <div class="close">
                                        <i class="fa fa-angle-double-left"></i>
                                    </div>
                                </div>
                                <div class="into-title">
                                    <h3>关于我</h3>
                                    <span>(AboutMe)</span>
                                    <div class="into-line"></div>
                                </div>
                                <div class="into-content noroll">
                                    <p>我是周维庆,一个90后男青年,现居于重庆,16年计算机专业毕业后,致力于网页开发技术,对WEB开发兴趣浓厚,以致于终日代码为伴,憧憬着成为一位不折不扣的程序员。</p>
                                    <p>曾经有着成为一位作家理想,不料为了生计最终落马成为一名程序猿,干一行爱一行,在工作及累积的过程中体会到了编程的魅力,为之深深着迷,现在看来这条路可能很长,也需要走的很久。</p>
                                    <p>个子不高,身材不胖,相貌平平,话少心善,更没有在身上纹过小猪佩奇!</p>
                                </div>
                                <div class="into-contact">
                                    <div class="we-qr">
                                        <img src="/static/images/wx-QR.png" alt="">
                                        <span>微信二维码</span>
                                    </div>
                                    <div class="contact">
                                        <a href="">
                                            <i class="fa fa-qq"></i>
                                            <span>939129894</span>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-weixin"></i>
                                            <span>zhangxunxun957loveme</span>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-envelope-o"></i>
                                            <span>zhangxunxun1314@outlook.com</span>
                                            <span>|939129894@qq.com</span>
                                        </a>
                                        <a href="https://weibo.com/u/6018806697" target="_block">
                                            <i class="fa fa-weibo"></i>
                                            <span>https://weibo.com/u/6018806697</span>
                                        </a>
                                        <a href="" target="_block">
                                            <i class="fa fa-github"></i>
                                            <span>ZionCheung</span>
                                        </a>
                                        <div style="color:#000">
                                            <i class="fa fa-map-marker"></i>
                                            <span>重庆市渝北区</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="maboutme-cact">
                                <div class="cact-close">
                                    <div class="close">
                                        <i class="fa fa-angle-double-left"></i>
                                    </div>
                                </div>
                                <div class="cact-title">
                                    <h3>给我留言</h3>
                                </div>
                                <div class="reform noroll">
                                    <label for="contact">联系方式</label>
                                    <input type="text" name="contact" class="aboutme-contact">
                                    <label for="">留言内容</label>
                                    <textarea name="" rows="10" class="reform-text"></textarea>
                                </div>
                                <div class="subbtn">
                                    <button class="btn">点击留言</button>
                                </div>
                                <div class="reline"></div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="swiper-slide aboutme-skill" style="background-image: url('/static/images/aboutme-bg2.jpg')">
                    <div class="skill">
                        <div class="container">
                            <div class="row">
                                <div class="skill-box col-sm-12">
                                    <div class="skill-list col-sm-4">
                                        <h1>我的技能</h1>
                                        <ul class="list-ul noroll">
                                            <li class="skill-php">
                                                <img src="/static/images/php-icon.png" alt="">
                                                <span class="skill-text">Php</span>
                                                <div class="php-bg actionkAnmh"></div>
                                            </li>
                                            <li>
                                                <img src="/static/images/sql-icon.png" alt="">
                                                <span class="skill-text">MySql</span>
                                                <div class="sql-bg actionkAnmh"></div>
                                            </li>
                                            <li>
                                                <img src="/static/images/html-icon.png" alt="">
                                                <span class="skill-text">Html</span>
                                                <div class="html-bg actionkAnmh"></div>
                                            </li>
                                            <li>
                                                <img src="/static/images/css-icon.png" alt="">
                                                <span class="skill-text">Css</span>
                                                <div class="css-bg actionkAnmh"></div>
                                            </li>
                                            <li>
                                                <img src="/static/images/js-icon.png" alt="">
                                                <span class="skill-text">Javascript</span>
                                                <div class="js-bg actionkAnmh"></div>
                                            </li>
                                            <li>
                                                <img src="/static/images/ps-icon.png" alt="">
                                                <span class="skill-text">PhotoShop</span>
                                                <div class="ps-bg actionkAnmh"></div>
                                            </li>
                                            <li>
                                                <img src="/static/images/fl-icon.png" alt="">
                                                <span class="skill-text">Flash</span>
                                                <div class="fl-bg actionkAnmh"></div>
                                            </li>
                                            <li>
                                                <img src="/static/images/more-icon.png" alt="">
                                                <span class="skill-text">其他软件</span>
                                                <div class="more-bg actionkAnmh"></div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="skill-content col-sm-8">
                                        <div class="content">
                                            <div class="php skill-label">
                                                <h1>Php</h1>
                                                <span>熟练</span>
                                                <span>thinkPHP -- 熟练</span>
                                                <p>能结合前端语言及数据库独立开发网站,能熟练使用thinkPHP5、thinkPHP3.2等框架,对Laravel,Yii等框架有了解。理解MVC模式及其设计原理，并能在项目实践中结合编码；有良好的代码编写习惯,对工作及程序有自我要求。</p>
                                            </div>
                                            <div class="mysql skill-label">
                                                <h1>MySql</h1>
                                                <span>熟练</span>
                                                <p>能熟练使用mysql数据库,有一定的数据库设计和优化能力;能结合前端语言及后台语言独立开发网站。</p>
                                            </div>
                                            <div class="html skill-label">
                                                <h1>Html</h1>
                                                <span>熟练</span>
                                                <p>熟悉HTML语言和CSS样式表，并能够熟练使用Div+css进行网页排版以及设计，擅长将网页原图模型转化成静态网页;熟悉HTML5标签,熟悉CSS3特性,能制作CSS3动画,熟练Bootstrap,layui等前端开发框架。</p>
                                            </div>
                                            <div class="css skill-label">
                                                <h1>Css</h1>
                                                <span>熟练</span>
                                                <p>熟悉HTML语言和CSS样式表，并能够熟练使用Div+css进行网页排版以及设计，擅长将网页原图模型转化成静态网页;熟悉HTML5标签,熟悉CSS3特性,能制作CSS3动画,熟练Bootstrap,layui等前端开发框架。</p>
                                            </div>
                                            <div class="javascript skill-label">
                                                <h1>JavaScript</h1>
                                                <span>熟练</span>
                                                <p>
                                                    能完成开发过程中需要的js脚本编写,熟悉jquery,vue,bootstrap等前端开发框架,了解(es5,es6)特性,熟练使用Ajax与后台进行数据交互。
                                                </p>
                                            </div>
                                            <div class="photoshop skill-label">
                                                <h1>PhotoShop</h1>
                                                <span>熟练</span>
                                                <p>熟练Ps切图,有一定的网页设计/网页配图制作/网页图片处理能力。</p>
                                            </div>
                                            <div class="flash skill-label">
                                                <h1>Flash</h1>
                                                <span>熟练</span>
                                                <p>熟练Flash页面动画制作,Flash静态网页制作</p>
                                            </div>
                                            <div class="appmore skill-label">
                                                <h1>其他</h1>
                                                <span>熟练</span>
                                                <p>熟练使用git进行代码管理,了解linux操作系统的使用,熟练使用Office,Wps等文字展示工具,熟练使用Xshell,Xftp等服务器操作工具,熟练使用Google等浏览器调试工具,熟练使用码云(gitee.com)、GitHub(github.com)等代码存放仓库。</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- max-width 768px -->
                    <div class="mskill">
                        <div class="container">
                            <div class="row">
                                <div class="mskill-content col-xs-12">
                                    <div class="mcontent">
                                        <div class="php mskill-label">
                                            <h1>Php</h1>
                                            <span>熟练</span>
                                            <span>thinkPHP -- 熟练</span>
                                            <p>能结合前端语言及数据库独立开发网站,能熟练使用thinkPHP5、thinkPHP3.2等框架,对Laravel,Yii等框架有了解。理解MVC模式及其设计原理，并能在项目实践中结合编码；有良好的代码编写习惯,对工作及程序有自我要求。</p>
                                        </div>
                                        <div class="mysql mskill-label">
                                            <h1>MySql</h1>
                                            <span>熟练</span>
                                            <p>能熟练使用mysql数据库,有一定的数据库设计和优化能力;能结合前端语言及后台语言独立开发网站。</p>
                                        </div>
                                        <div class="html mskill-label">
                                            <h1>Html</h1>
                                            <span>熟练</span>
                                            <p>熟悉HTML语言和CSS样式表，并能够熟练使用Div+css进行网页排版以及设计，擅长将网页原图模型转化成静态网页;熟悉HTML5标签,熟悉CSS3特性,能制作CSS3动画,熟练Bootstrap,layui等前端开发框架。</p>
                                        </div>
                                        <div class="css mskill-label">
                                            <h1>Css</h1>
                                            <span>熟练</span>
                                            <p>熟悉HTML语言和CSS样式表，并能够熟练使用Div+css进行网页排版以及设计，擅长将网页原图模型转化成静态网页;熟悉HTML5标签,熟悉CSS3特性,能制作CSS3动画,熟练Bootstrap,layui等前端开发框架。</p>
                                        </div>
                                        <div class="javascript mskill-label">
                                            <h1>JavaScript</h1>
                                            <span>熟练</span>
                                            <p>
                                                能完成开发过程中需要的js脚本编写,熟悉jquery,vue,bootstrap等前端开发框架,了解(es5,es6)特性,熟练使用Ajax与后台进行数据交互。
                                            </p>
                                        </div>
                                        <div class="photoshop mskill-label">
                                            <h1>PhotoShop</h1>
                                            <span>熟练</span>
                                            <p>熟练Ps切图,有一定的网页设计/网页配图制作/网页图片处理能力。</p>
                                        </div>
                                        <div class="flash mskill-label">
                                            <h1>Flash</h1>
                                            <span>熟练</span>
                                            <p>熟练Flash页面动画制作,Flash静态网页制作</p>
                                        </div>
                                        <div class="appmore mskill-label">
                                            <h1>其他</h1>
                                            <span>熟练</span>
                                            <p>熟练使用git进行代码管理,了解linux操作系统的使用,熟练使用Office,Wps等文字展示工具,熟练使用Xshell,Xftp等服务器操作工具,熟练使用Google等浏览器调试工具,熟练使用码云(gitee.com)、GitHub(github.com)等代码存放仓库。</p>
                                        </div>
                                    </div>
                                    <div class="mskill-list noroll">
                                        <ul class="mlist-ul">
                                            <li>Php</li>
                                            <li>Mysql</li>
                                            <li>Html</li>
                                            <li>Css</li>
                                            <li>JavaScript</li>
                                            <li>PhotoShop</li>
                                            <li>Flash</li>
                                            <li>其他软件</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide aboutme-web" style="background-image: url('/static/images/aboutme-bg2.jpg')">
                    <div class="web-info">
                        <div class="container">
                            <div class="row">
                                <div class="web-content col-sm-8">
                                    <div class="content-title">
                                        <h2>关于本站</h2>
                                        <p>似乎程序员都曾经做过一个属于自己的网站,没错!我也是抱着这个想法利用工作之余开始了本站的制作,从页面设计、前端页面编写、数据库设计/创建、后端功能实现,断断续续的竟花了快2个月;现在想想当初真不该动手,也佩服自己的意志,还是把基本的功能都写完了,给自己点个赞吧!最初给本站的定位是一个学习型的博客网站,可以放一些技术交流的文章,但是在制作过程中过于随性,风格可能略有偏失,不过还是算一个博客吧!</p>
                                    </div>
                                    <div class="content-tool">
                                        <p>前端:BootStrap,Font Awesome</p>
                                        <p>后端:Php,ThinkPHP5</p>
                                        <p>开发者:Zion Chueng | 2018.8</p>
                                    </div>
                                    <div class="content-bottom">
                                        <a class="b-qq" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=939129894&site=qq&menu=yes">
                                            <i class="fa fa-qq"></i>
                                        </a>
                                        <ul class="b-list">
                                            <li class="logo"><img src="/static/images/aboutmelogo2.png" alt=""></li>
                                            <li>
                                                <p>zhangxxun | 2018.8</p>
                                            </li>
                                            <li><a href="http://www.miitbeian.gov.cn" target="_black">蜀ICP备18020042号-1</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    </div>
    <script src="/static/js/bootstrap.min.js "></script>
    <script src="/static/js/swiper-4.3.3.min.js "></script>
    <script type="text/javascript ">
        var swiper = new Swiper('.swiper-container', {
            pagination: {
                el: '.swiper-pagination',
                dynamicBullets: true,
                clickable: true,
                type: 'progressbar',
            },
            /* autoplay: {
                delay: 10000,
                stopOnLastSlide: false,
                disableOnInteraction: true,
            }, */
            direction: 'vertical',
            noSwiping: true,
            noSwipingClass: 'noroll',
            mousewheel: true,
            speed: 1000,
            resistanceRatio: 0,
            on:{
                slideChangeTransitionEnd:function(){
                    var currPage = this.activeIndex;
                    var liAni = $('.list-ul>li>div');
                    if (currPage == 2) {
                        liAni.addClass('actionkAnm');
                    }else{
                        liAni.removeClass('actionkAnm');
                    }           
                }
            }
        });
        $('#mebtn').click(function() {
            swiper.slideNext();
        });
        $('#iconDown').click(function() {
            swiper.slideNext();
        });
        $('#webbtn').click(function(){
            swiper.slideTo(3, 1000, false);
        });
        $(function() {
            $('.list-ul').on('mouseover', 'li', function () {
                    var labelBtn = $('.skill-label');
                    var liIndex = $(this).index();
                    labelBtn.eq(liIndex)
                    .addClass('skillaction')
                    .siblings().removeClass('skillaction');
             });
             $('.mlist-ul').on('click','li',function(){
                 var mlabelBtn = $('.mskill-label');
                 var mliIndex = $(this).index();
                 mlabelBtn.eq(mliIndex)
                 .show()
                 .siblings().hide();
             });
            $('.cover-box').fadeIn(1000);
            $('.nav-icon').click(function() {
                var navAni = $('.nav-list');
                var navCloseAni = $('.li-close');
                navAni.animate({
                    right: '0'
                }, 1000);
                navAni.animate({
                    borderTopLeftRadius: '14em',
                    borderBottomLeftRadius: '14em'
                }, 600);
                navCloseAni.animate({
                    opacity: '1'
                }, 1000);
                navCloseAni.animate({
                    marginTop: '0'
                }, 500);
                navCloseAni.animate({
                    marginTop: '10px'
                }, 100);
                navCloseAni.animate({
                    marginTop: '0'
                }, 100);
                navCloseAni.animate({
                    marginTop: '10px'
                }, 100);
                navCloseAni.animate({
                    marginTop: '0'
                }, 100);
            });
            $('.li-close').click(function() {
                var navAni = $('.nav-list');
                var navCloseAni = $('.li-close');
                navAni.animate({
                    borderTopLeftRadius: '0em',
                    borderBottomLeftRadius: '0em'
                }, 600);
                navAni.animate({
                    right: '-328px'
                }, 1000);
                navCloseAni.animate({
                    opacity: '0'
                });
                navCloseAni.animate({
                    backgroundColor: 'none'
                }, 1000);
                navCloseAni.animate({
                    marginTop: '320px'
                }, 1000);
            });
            $('.mtitle').click(function() {
                var maboutmeAni = $('.maboutme-into');
                maboutmeAni.animate({left:'50%'},1000);
            });
            $('.into-close').click(function(){
                var maboutmeAni = $('.maboutme-into');
                maboutmeAni.animate({left:'-55%'},500);
            });
            $('.mtitletwo').click(function() {
                var maboutmeAni = $('.maboutme-cact');
                maboutmeAni.animate({left:'50%'},1000);
            });
            $('.cact-close').click(function(){
                var maboutmeAni = $('.maboutme-cact');
                maboutmeAni.animate({left:'-55%'},500);
            });
        });
    </script>
</body>

</html>