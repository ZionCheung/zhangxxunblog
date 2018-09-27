<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:51:"E:\www\zhangxxunblog\public/../application/404.html";i:1537885663;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $e->getMessage(); ?></h1>
    <h1><a href="<?php echo url('index/index/index'); ?>">点击返回主页</a></h1>
</body>
</html>