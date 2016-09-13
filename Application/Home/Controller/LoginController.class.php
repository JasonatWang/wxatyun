<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends BaseController {
    public function index(){
        // $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        if($_SESSION['userid']){
            $this->redirect("/Home/Index/index");
        }else{
            $this->display();
        }
    }
    public function userlogin(){
        $User=D("User");
        $userinfo['cellphone']=I("cellphone");
        $userinfo["password"]=I("password");
        $username=$User->where($userinfo)->select();
//        dump($username);
//        echo "welcome!<br/>".$username[0]['nickname'];
        if($username[0]['nickname']){
            $_SESSION['userid']=$username[0]['userid'];
            $_SESSION['nickname']=$username[0]['nickname'];
            $this->redirect('/Home/Index/index');//重定向到Home模块下的Index的index.html
        }else{
            $this->error("用户名或密码错误,请重试");
        }
    }
    public function welcome(){
        $User=D("User");
        $userinfo['cellphone']=I("cellphone");
        $userinfo["password"]=I("password");
        $username=$User->where($userinfo)->select();
        if($username[0]['nickname']) {
            echo " ".$username[0]['nickname'];
        }
    }
    public function retrievepw(){
        $User=D("User");
        $userinfo["email"]=I("email");
        $userinfo['cellphone']=I("cellphone");
        $username=$User->where($userinfo)->find();
        if($username['nickname']) {
            $this->success("您的密码是".$username['password'],U('Login/login'),3);
        }
    }
    public function creatVerify(){
        ob_clean();
        $Verify = new \Think\Verify();
        $Verify->useImgBg = true;
        $Verify->entry();
    }
}