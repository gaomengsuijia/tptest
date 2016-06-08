<?php

//Goods商品数据模型model

namespace Model;
use Think\Model;

//父类Model  ThinkPHP/Library/Think/Model.class.php

class UserModel extends Model{
	//设置可以批处理验证
	protected $patchValidate    =   true;
	protected $_validate        =   array(
			//验证用户名不能为空
		array('username','require','用户名不能为空'),
			//验证密码
		array('password','require','密码不能为空'),
			//验证确认密码与原密码一致
		array('password2','password','密码不一致',0,'confirm'),	
			//验证邮箱
		array('user_email','email','邮箱格式错误'),
			//qq号码验证
		array('user_qq','/^[1-9]\d{4,8}$/','qq格式错误',2,'regex'),
			//验证手机号码
		array('user_tel','/^(137|136)\d{8}$/','手机号码格式错误',2,'regex'),
			//验证学历
		array('user_xueli','2,3,4,5','学历必选',0,'in'),
			//验证爱好
		array('user_hobby','checkout_hobby','爱好必须两项及以上',1,'callback'),						
			
	);
	//定义验证爱好函数$name为函数参数
	function checkout_hobby($name){
		if(count($name)<2){
			return false;
		}else {
			return true;
		}
	}
    
}
