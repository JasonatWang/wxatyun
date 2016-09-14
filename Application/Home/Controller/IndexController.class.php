<?php
namespace Home\Controller;
use Org\Net\Http;
use Think\Controller;
use Think\Upload\Driver\Qiniu\QiniuStorage;

class IndexController extends BaseController {
    public function index(){
        // $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        if($_SESSION['userid']){
            $this->display();
        }
        else{
            $this->error('请先登录');
        }
    }
    public function upload(){//文件上传
        $setting=C("UPLOAD_SITEIMG_QINIU");
        $setting['savePath']="./".$_SESSION['userid']."/";
        $upload = new \Think\Upload($setting);// 实例化上传类
        // 上传文件
        $info = $upload->upload($_FILES);
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            //实例化模型
            $Fileinfo = D('Fileinfo');
            $data['userID']=$_SESSION['userid'];
            $data['userDirname']='./'.$_SESSION['userid'].'/';
            $data['savePath']="./".$_SESSION['userid']."/";
            $data['saveName']=$info['users']['savename'];
            $data['fileName']=$_FILES["users"]["name"];
            $data['fileSize']=$_FILES["users"]["size"];
            $data['fileSuffix']=strtok($_FILES["users"]["type"],'/');
            $Fileinfo->create($data);
            $Fileinfo->add();
            $this->success($_FILES['users']['name']."上传成功");//返回文件原名，文件大小$_FILES["file"]["size"]$info['users']['savename']

        }
    }
    public function showDirname()
    {
        /*$current_dir = './WXYUN_USER_Uploads/'
        $dir = opendir($current_dir);
        if ($dir) {
            if ($current_dir === './WXYUN_USER_Uploads/') {
                echo '所有文件';
            } else {
                echo $current_dir;
            }
        } else {
            echo "还没有文件";
            exit();
        }*/
        $file=D('Fileinfo');
        $map['userID']=$_SESSION['userid'];
        $result=$file->where($map)->select();
        if($result){
            echo '所有文件';
        }else{
            echo '还没有文件';
        }
    }
    public function showFilename(){
                //实例化模型
                $Fileinfo = M('Fileinfo');
                $map['userID']=$_SESSION['userid'];
                $file=$Fileinfo->where($map)->select();//查询临时文件名，并进行替换
                foreach($file as $filename) {
                    $actionfile = $filename['filename'];
                    echo "<a id='actionlist' class=\"list-group-item\">";
                    echo "<span class=\"glyphicon  glyphicon-file\"></span> ";
                    echo $filename['filename'];
                    echo "<button id='actionbtn' value=\"$actionfile\" class='btn btn-primary' type='submit' name='deletefile'>";
                    echo "<span id='actionicon' class=\"glyphicon  glyphicon-floppy-remove\"></span>";
                    echo " 删除";
//                dump($filename);
                    echo "</button>";
                    echo "<button id='actionbtn' value=\"$actionfile\" class='btn btn-primary' type='submit' name='downloadfile'>";
                    echo "<span id='actionicon' class=\"glyphicon  glyphicon-cloud-download\"></span>";
                    echo " 下载";
//                dump($filename);
                    echo "</button>";
                    echo "</a>";
                }
    }
    public function sort(){
        $_SESSION['sortitem']=I('sortitem');
        if(I('sortitem')==="all"){
//            $this->showFilename();
            $this->redirect('/Home/Index/index');
            exit();
        }
        $this->redirect('/Home/Index/sortitem');
    }
    public function showsortitem(){
        //实例化模型
        $Fileinfo = D('Fileinfo');
        $map['userID']=$_SESSION['userid'];
        $map['fileSuffix']=$_SESSION['sortitem'];
        $filetype=$Fileinfo->where($map)->select();
//        dump($filetype);
//        $data['savePath']="./".$_SESSION['userid'].$_SESSION['nickname']."/";

        foreach($filetype as $item){
            $actionfile=$item['filename'];
            echo "<a id='actionlist' class=\"list-group-item\">";
            echo "<span class=\"glyphicon  glyphicon-file\"></span> ";
            echo $item['filename'];
            echo "<button id='actionbtn' value=\"$actionfile\" class='btn btn-primary' type='submit' name='deletefile'>";
            echo "<span id='actionicon' class=\"glyphicon  glyphicon-floppy-remove\"></span>";
            echo " 删除";
//                dump($filename);
            echo "</button>";
            echo "<button id='actionbtn' value=\"$actionfile\" class='btn btn-primary' type='submit' name='downloadfile'>";
            echo "<span id='actionicon' class=\"glyphicon  glyphicon-cloud-download\"></span>";
            echo " 下载";
//                dump($filename);
            echo "</button>";
//                dump($filename);
            echo "</a>";
        }
    }
    public function showDirsortitem(){
        switch($_SESSION['sortitem']){
            case 'video': echo '所有视频';break;
            case 'audio': echo '所有音乐';break;
            case 'application': echo '所有应用';break;
            case 'image': echo '所有图片';break;
            case 'text': echo '所有文本';break;
            case 'trash': echo '回收站';break;
        }
    }
    public function showRoomleft(){
        //实例化模型
        $Fileinfo = D('Fileinfo');
        $User=D('User');
        $map['userID']=$_SESSION['userid'];
        $roomleft=$Fileinfo->where($map)->select();
        $userroom=$User->where($map)->find();
        $totalRoom=0;
        foreach($roomleft as $item) {
           $totalRoom+=$item['filesize'];
        }
        $progress=($totalRoom/$userroom['totalroom'])*100;
        echo "<div class=\"progress\">
                <div class=\"progress-bar progress-bar-info\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: $progress%;\">
                </div>
              </div>";
//        echo $totalRoom."/".$userroom['totalroom'];
    }
    public function download(){
        if(!I('downloadfile')){
            $this->delete();
            exit();
        }
        $map['fileName']=I('downloadfile');
        $map['userID']=$_SESSION['userid'];
        if($map==''){
            $this->error('下载失败！','',1);
        }
        $file=D('Fileinfo');
        $result= $file->where($map)->find();//根据id查询到文件信息
//        dump($result);
        if($result==false) //如果查询不到文件信息
        {
            $this->error('下载失败！', '', 1);
        }else{
            $url="http://odf445i0o.bkt.clouddn.com/"."._".$_SESSION['userid']."_".$result['savename']."?attname=".$result['filename'];
            $RealDownloadUrl=Qiniu_Sign($url);
            header('Location:'.$RealDownloadUrl);

        }

    }
    public function delete(){
        $map['fileName']=I('deletefile');//GET方式传到此方法中的参数id,即文件在数据库里的保存id.根据之查找文件信息。
        $map['userID']=$_SESSION['userid'];
        if($map==''){
            $this->error('删除失败！','',1);
            exit();
        }
        $file=D('Fileinfo');
        $result= $file->where($map)->find();//根据id查询到文件信息
//        dump($result);
        if($result==false) //如果查询不到文件信息
        {
            $this->error('删除失败！', '', 1);
            exit();
        }else{
            $savename="._".$_SESSION['userid']."_".$result['savename'];
            $setting=C('UPLOAD_SITEIMG_QINIU');
            $actionFile=new \Think\Upload\Driver\Qiniu\QiniuStorage($setting['driverConfig']);
            $ifdel=$actionFile->del($savename);
            if($ifdel!==false){
                $file->where($map)->delete();
                $this->success("删除成功！");
                exit();
            }else{
                $this->error('删除失败！', '', 1);
                exit();
            }
        }
    }
    public function changepwd(){
        $pwd=D('User');
        $map['userID']=$_SESSION['userid'];
        $repassword=I('repassword');
        $data['password']=I('password');
        $result=$pwd->where($map)->find();
        if($result['password']==I("oldpassword")){
            if($data['password'] && $repassword){
                if($repassword == $data['password']){
                    $pwd->where($map)->save($data);
                    $this->success("修改密码成功!请重新登录",U("Login/login"),3);
                }else{
                    $this->error("确认密码错误!",'',2) ;
                    exit();
                }
            }else{
            }
        }else{
            $this->error("原密码错误!",'',2) ;
            exit();
        }
    }
}
