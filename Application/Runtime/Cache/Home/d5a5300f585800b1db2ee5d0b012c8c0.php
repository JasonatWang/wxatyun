<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>WX云</title>
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
                  <li><a href="<?php echo U('Index/changepassword');?>">账号设置</a></li>
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
<div id="sidebar" class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
   <form method="post" action="<?php echo U('Index/sort');?>">
   <button name="sortitem" value="all" class="list-group-item "><span class="glyphicon  glyphicon-th-list"></span> 所有文件</button>
   <button name="sortitem" value="video" type="submit" class="list-group-item "><span class="glyphicon glyphicon-facetime-video"></span> 视频</button>
   <button name="sortitem" value="audio" type="submit" class="list-group-item "><span class="glyphicon glyphicon-music"></span> 音乐</button>
   <button name="sortitem" value="application" type="submit" class="list-group-item "><span class="glyphicon glyphicon-th-large"></span> 应用</button>
   <button name="sortitem" value="image" type="submit" class="list-group-item "><span class="glyphicon glyphicon-picture"></span> 图片</button>
   <button name="sortitem" value="text" type="submit" class="list-group-item "><span class="glyphicon glyphicon-folder-close"></span> 文本</button>
   <button name="sortitem" value="trash" type="submit" class="list-group-item "><span class="glyphicon glyphicon-trash"></span> 回收站</button>
   <a class="list-group-item ">
            <span class="glyphicon glyphicon-tasks">
                </span>
      占用空间
      <?php
 $Room=A('Index'); $Room->showRoomleft(); ?>
   </a>
   </form>
</div>

<div class="btn-group col-lg-10 col-md-10 col-sm-10 col-xs-10">
    <!-- 提供额外的视觉效果，标识一组按钮中的原始动作 -->
    <!-- 按钮触发模态框 -->
    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        <span class="glyphicon glyphicon-cloud-upload"></span> 上传文件
    </button>
    <!-- 模态框（Modal） -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="post" action="/mywebsite_demo/index.php/Home/Index/upload" enctype="multipart/form-data">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            上传文件
                        </h4>
                    </div>
                    <div class="modal-body">
                        请选择文件
                        <input type="file" class="file" name="users">
                    </div>
                </form>

                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>
                    <button type="submit" class="btn btn-primary">
                        确认上传
                    </button>
                </div> -->
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!-- 标准的按钮 -->

    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-asterisk"></span> 新建文件夹</button>
    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-sort-by-order"></span> 按时间排序</button>
    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-sort-by-alphabet"></span> 按文件名排序</button>
    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> 按大小排序</button>
</div>
<div class="filelist col-lg-10 col-md-10 col-sm-10 col-xs-10">

    <div class="row">
        <p></p>
        <a href="#" class="list-group-item" id="filefolder" style="background-color: #2b669a">
            <span class="glyphicon  glyphicon-th"></span>
            <?php
 $filename=A('Index'); $filename->showDirsortitem(); ?>
        </a>
        <form method="post" action="/mywebsite_demo/index.php/Home/Index/download">
            <?php
 $filename=A('Index'); $filename->showsortitem(); ?>
        </form>
    </div>
</div>


<footer>
</footer>
</body>
</html>
<!-- <form method="post" action="/mywebsite_demo/index.php/Home/Index/insert">
    <input type="text" name="name" >姓名<br/>
    性别<input type="radio" name="sex" value="男" >男
    <input type="radio" name="sex" value="女" > 女<br/>
    <input type="text" name="class">班级<br/>
    <input type="text" name="profession">专业<br/>
    <input type="text" name="college">学院<br/>
    <input type="text" name="cellphone">手机号<br/>
    <input type="text" name="email">邮箱<br/>
    部门志愿<br/>
    <input type="radio" name="department" value="研发" > 研发部
    <input type="radio" name="department" value="运营" > 运营部
    <input type="radio" name="department" value="设计" > 设计部<br/>
    报名理由<br/>
    <textarea name="introduction" cols="50" rows="5"></textarea><br/>
    <input  type="submit"></button>
</form> -->
<!--action="/user/register"-->