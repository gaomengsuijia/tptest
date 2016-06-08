<?php
namespace Admin\Controller;
use \Component\AdminController;
class RoleController extends AdminController{
	function showlist(){
		//获取角色
		$role_data=D()->table('sw_role')->select();
		$this->assign('role_data',$role_data);
		$this->display();
	}
	function distribute(){
		//获取角色信息
		$role_data=D('role')->where('role_id='.$_GET['role_id'])->select();
		if(!empty($_POST)){
			$role_M=new \Model\RoleModel;
			$r=$role_M->RoleUpdata($role_data[0]['role_id'],$_POST);
			if($r){
				$this->success('权限修改成功',U('showlist'));
			}else{
				$this->error('权限修改失败',U('showlist'));
			}
		}else{
			//获取所有的顶级权限
			$auth_top=D()->table('sw_auth')->where('auth_level=0')->select();
			//获取所有的次级权限
			$auth_ci=D()->table('sw_auth')->where('auth_level=1')->select();
			//show_bug($role_data['role_name']);
			//将角色权限ids转换成数组
			$role_auth_ids_arr=explode(',',$role_data[0]['role_auth_ids']);
			$this->assign('role_auth_ids_arr',$role_auth_ids_arr);
			$this->assign('role_name',$role_data[0]['role_name']);
			$this->assign('auth_top',$auth_top);
			$this->assign('auth_ci',$auth_ci);
			$this->display();
		}
	}
	//添加角色
	function add(){
		if(!empty($_POST)){
			$role_data=D('role')->add($_POST);
			if($role_data){
				$this->success('角色添加成功',U('showlist'));
			}else {
				$this->error('角色添加失败,请重试',U('showlist'));
			}
			
		}else {
		$this->display();
		}
	}
	
	
	
	
	
	
	
	
}