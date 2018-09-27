<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"E:\www\zhangxxunblog\public/../application/admin\view\admin\login.html";i:1537926227;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/static/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/static/css/adlogin.css" />
    <title>登陆后台_zhangxxun</title>
</head>

<body>
    <div class="desktop">
        <div class="lg-bg">
            <div class="lg-input">
                <div class="lg-logo">
                    <img src="/static/images/adloginlogo.png" alt="">
                </div>
                <div class="lg-from">
                    <form action="<?php echo url('admin/login/loginHandle'); ?>" method="POST">
                        <label for="username">username</label>
                        <input type="text" autocomplete="off" name="username">
                        <label for="password">password</label>
                        <input type="password" name="password">
                        <div class="lg-code">
                            <label for="code">Code</label>
                            <div class="code">
                                <img src="<?php echo captcha_src(); ?>" alt="" onclick="codeReset()" class="codeimg">
                                <input type="text" name="code" id="veriCode" class="code" autocomplete="off" onblur="codeVerifyAjax()">
                            </div>
                            <span id="codeinfo" style="display:block;color:#fff;"></span>
                        </div>
                        <input type="submit" class="lg-btn" value="登陆">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/static/js/jquery-3.3.1.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function codeReset() {
            var codeMath = Math.random() * 10000;
            var newCode = "/captcha?id=" + codeMath;
            $('.codeimg').attr('src', newCode);
        }
        function codeVerifyAjax() {
            var codeVal = $('#veriCode').val();
            var codeInfo = $('#codeinfo');
            $.post("<?php echo url('admin/login/codeHandle'); ?>", { 'codeVal': codeVal }, function success(data) {
                if (data.errno != 0) {
                    codeInfo.html('验证码填写错误!');
                } else {
                    codeInfo.html('');
                }
            }, 'json');
        }
    </script>
</body>

</html>