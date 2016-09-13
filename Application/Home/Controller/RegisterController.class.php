<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends BaseController {
    public function index(){
        // $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
    
    public function insert(){
    	$User=D("User");
    	$data['cellphone']=I("cellphone");
    	$data["password"]=I("password");
		$data["repassword"]=I("repassword");
    	$data["email"]=I("email");
    	$data["nickname"]=I("nickname");
    	$data["totalRoom"]=1073741824;
    	$data["createTime"]=Date('Y-m-d H:i:s');
        if ($User->create($data)) {
        	# code...
       		if (false!=$User->add()) {
       			# code...
				$this->success('注册成功!请登录进行使用',U('Login/login'),3);
         		// $this->display("Submit:submit");,"Index/index",5
				// $this->redirect('Login:login', array('cate_id' => 2), 5, '注册成功');
       		}
       		else{
       			$this->error('注册失败');
       		}
        }
        else{
        		//字段验证错误
        		$this->error($User->getError());
        	}
    }
}