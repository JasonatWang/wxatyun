<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>欢迎来到WX云</title>
    <link href="/mywebsite_demo/Public\Home\css\bootstrap.min.css" rel="stylesheet">
    <!--<link href="/mywebsite_demo/Public\Home\css\bootstrap-theme.min.css" rel="stylesheet">-->
    <!--<link href="/mywebsite_demo/Public\Home\css\fileinput.min.css" media="all" rel="stylesheet" type="text/css" />-->
    <link href="/mywebsite_demo/Public\Home\css\style.css" rel="stylesheet">
    <script src="/mywebsite_demo/Public\Home\js\jquery-3.1.0.min.js"></script>
    <!--<script src="/mywebsite_demo/Public\Home\js\fileinput.min.js"></script>-->
    <script src="/mywebsite_demo/Public\Home\js\bootstrap.js"></script>
    <script src="/mywebsite_demo/Public\Home\js\index.js"></script>
    <!--<script src="/mywebsite_demo/Public\Home\js\fileinput_locale_zh.js"></script>-->
    <link rel="shortcut icon" href="/mywebsite_demo/Public\Home\image\logo.png">
</head>
<body style="background-color: black">
<!--导航栏-->
<div class="container-fluid" >
    <nav class="navbar navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#example-navbar-collapse">
                    <span class="sr-only">切换导航</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo U('Index/index');?>">
                    <img src="/mywebsite_demo/Public\Home\image\WX云-logo.png" width="110px" height="40px"/>
                </a>

            </div>
                <ul class="nav navbar-nav navbar-right" style="margin-left: 0">
                    <li><a href="#"><span class="glyphicon glyphicon-comment"></span> 联系我们</a></li>
                    <li><a href="<?php echo U('Login/login');?>"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
                </ul>
            </div>

        </div>
    </nav>
</div>
<div  style = "height:50px"></div>
<!--轮播-->
<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3500">
    <!-- 轮播（Carousel）指标 -->

    <ol class="carousel-indicators">

        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>

    </ol>
    <!-- 轮播（Carousel）项目 -->
    <div class="carousel-inner ">

        <div class="item active">
            <img src="/mywebsite_demo/Public\Home\image\slide1.jpg" width="100%" alt="First slide">
            <div class="carousel-caption">永久保存您的文件</div>
        </div>
        <div class="item">
            <img src="/mywebsite_demo/Public\Home\image\slide2.jpg" width="100%" alt="Second slide">
            <div class="carousel-caption">随时随地使用云端文件</div>
        </div>
        <div class="item">
            <img src="/mywebsite_demo/Public\Home\image\slide3.jpg" width="100%" alt="Third slide">
            <div class="carousel-caption">不占用本地空间的云盘</div>
        </div>
    </div>
    <!-- 轮播（Carousel）导航 -->
    <a class="carousel-control left" href="#myCarousel"
       data-slide="prev">&lsaquo;
    </a>
    <!--<a class="carousel-control right" href="#myCarousel"-->
       <!--data-slide="next">&rsaquo;-->
    <!--</a>-->
    <div id="test">
        <h4 id="welcome">欢迎注册WX云!</h4><br/><br/>
        <form class="bs-example bs-example-form" role="form" method="post" action="/mywebsite_demo/index.php/Home/Register/insert">
            <div class="input-group">
                <span class="input-group-addon">
                <span class="glyphicon glyphicon-tower"></span>
                     昵 称
                </span>
                <input type="text" name="nickname" class="form-control" placeholder="昵称">
            </div>
            <br/><div class="input-group">
                <span class="input-group-addon">
                <span class="glyphicon glyphicon-envelope"></span>
                     邮 箱</span>
            <input type="text" name="email" class="form-control" placeholder="请填写您的邮箱">
        </div>
            <br/>
            <div class="input-group">
                <span class="input-group-addon">
                <span class="glyphicon glyphicon-phone"></span>
                     手机号
                </span>
                <input type="text" name="cellphone" class="form-control" placeholder="手机号">
            </div>
            <br/>

            <div class="input-group">
                <span class="input-group-addon">
                <span class="glyphicon glyphicon-lock"></span>
                     密 码
                </span>
                <input type="password" name="password" class="form-control" placeholder="密码">
            </div>
                <span class="help-block">请输入6~18位的密码。</span>
            <div class="input-group">
                <span class="input-group-addon">
                <span class="glyphicon glyphicon-lock"></span>
                     确认密码
                </span>
                <input type="password" name="repassword" class="form-control" placeholder="再次输入密码以确认">
            </div>
            <br/>
        <input type="submit" id="login" class="btn btn-primary col-md-12" value="注册">
        </form>
        <br/>
    </div>
</div>
</body>
</html>