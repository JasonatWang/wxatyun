<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
	//自动验证
	protected $_validate=array(
			array('nickname','require','请填写昵称',1),
			array('email','require','请填写邮箱',1),
			array('email','','此邮箱已经注册过',0,'unique',1),
			array('email','email','请使用正确的邮箱格式',2),
			array('cellphone','require','请填写手机号',1),
			array('cellphone','number','手机号必须是数字形式',1),
			array('cellphone','','本手机号已经注册过',0,'unique',1),
			array('cellphone','11','手机号长度不符',3,'length'),
			array('password','require','请填写密码',1),
			array('password','6,18','密码长度不符',3,'length'),
			array('repassword','require','请确认密码',1),
			array('repassword','password','两次填写的密码不一致',2,'confirm'),
		);
	//自动填充
	protected $_auto=array(
			array('creatTime','time',1,'function'),
		);
}