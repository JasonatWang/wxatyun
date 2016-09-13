<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改密码</title>
    <link href="/mywebsite_demo/Public\Home\css\bootstrap.min.css" rel="stylesheet">
    <!--<link href="/mywebsite_demo/Public\Home\css\bootstrap-theme.min.css" rel="stylesheet">-->
    <link href="/mywebsite_demo/Public\Home\css\fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="/mywebsite_demo/Public\Home\css\style.css" rel="stylesheet">
    <script src="/mywebsite_demo/Public\Home\js\jquery-3.1.0.min.js"></script>
    <script src="/mywebsite_demo/Public\Home\js\fileinput.min.js"></script>
    <script src="/mywebsite_demo/Public\Home\js\bootstrap.js"></script>
    <script src="/mywebsite_demo/Public\Home\js\index.js"></script>
    <script src="/mywebsite_demo/Public\Home\js\fileinput_locale_zh.js"></script>
    <link rel="shortcut icon" href="/mywebsite_demo/Public\Home\image\logo.png">
</head>
<body>
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
            <div class="collapse navbar-collapse" id="example-navbar-collapse">
                <ul class="nav navbar-nav ">
                    <li><a href="#" ><span class="glyphicon glyphicon-home"></span> 个人主页</a></li>
                    <li><a href="#" ><span class="glyphicon glyphicon-cloud"></span> 云盘</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-share"></span>分享</a></li>
                </ul>
                <form id="search" class="navbar-form navbar-right" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="搜索文件">
                        <span class="input-group-addon "><button id="searchico" class="glyphicon glyphicon-search"></button></span>
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right" style="margin-left: 0">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span>
                            <?php
 echo $_SESSION['nickname']; ?> <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="#">账号设置</a></li>
                            <li><a href="#">容量及使用</a></li>
                            <li class="divider"></li>
                            <li><a href="#">帮助中心</a></li>
                            <li><a href="#">意见反馈</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo U('Login/login');?>">退出</a></li>
                        </ul>
                    </li>

                    <li><a href="<?php echo U('Login/login');?>"><span class="glyphicon glyphicon-log-out"></span> 退出</a></li>
                </ul>
            </div>

        </div>
    </nav>
</div>
<div  style = "height:50px"></div>
<form method="post" action="/mywebsite_demo/index.php/Home/Index/changepwd">
    <input name="oldpassword" type="password" placeholder="旧密码" />
    <input name="password" type="password" placeholder="新密码" />
    <input name="repassword" type="password" placeholder="确认新密码" />
    <input type="submit" value="更改密码">
</form>
</body>
</html>