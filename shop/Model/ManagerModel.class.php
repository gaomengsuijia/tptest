<?php
namespace Model;
use Think\Model;
class ManagerModel extends Model{
	function CheckUP($username,$password){
		//获取username字段,该方法是Model类的__call方法
		$user=$this->getbyMg_name($username);
		if($user!=null){
		//判断密码是否一致
			if ($user['mg_pwd']==$password){
				return $user;
			}else{
				return false;
			}
		}else {
			return false;
		}
	}
}