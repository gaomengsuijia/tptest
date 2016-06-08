<?php
namespace Component;
use Think\Controller;
class AdminController extends Controller{
	function __construct(){
		//先运行父类的构造方法,防止把父类的构造方法覆盖而导致程序出错
		parent::__construct();
		//查询出登陆用户的可访问权限
		//$sql = "select r.role_auth_ac from sw_manager m join sw_role r on m.mg_role_id=r.role_id where m.mg_id=".$_SESSION['user_id'];
		$now_auth=CONTROLLER_NAME.'-'.ACTION_NAME;
		$sql ="select role_auth_ac from sw_manager a join sw_role b on a.mg_role_id=b.role_id where a.mg_id=".$_SESSION['user_id'];
		$data = D() -> query($sql);
		$yong_auth=$data[0]['role_auth_ac'];
		//show_bug($yong_auth);exit();
		//公共的有权限
		$common_auth=array(
			'Index-left','Index-right','Index-head','Index-index','Manager-login'
		);
		if(!in_array($now_auth,$common_auth) && $_SESSION['user_id']!=1 && strpos($yong_auth,$now_auth)==false){
			$this->error('没有权限',U('index/index'));
			
		}
		
		
	}
}