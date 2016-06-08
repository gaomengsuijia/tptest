<?php
namespace Admin\Controller;
use Component\AdminController;
class AuthController extends AdminController{
	function showlist(){
		$total=D('auth')->count();
		$per=7;
		//实例化page类
		//$page=new \Compontent\Page($total,$listRows);//autoLoad();
		$page = new \Component\Page($total, $per); //autoload
		//3. 拼装sql语句获得每页信息
		$sql = "select * from sw_auth ".$page->limit;
		$info = D('auth') -> query($sql);
		//4. 获得页码列表
		$pagelist = $page -> fpage();
		$info=$this->getInfo();
		$this->assign('pagelist',$pagelist);
		$this->assign('info',$info);
		$this->display();
	}
	function add(){
		if(!empty($_POST)){
			//通过数据模型 将提交的数据整合以便将所有字段插入数据表中
			
			$auth_M=new \Model\AuthModel;
			$t=$auth_M->auth_save($_POST);
			if ($t){
				$this->success('添加成功',U('showlist'));
			}else {
				$this->success('添加失败,请重试',U('showlist'));
			}

			
		}else {
			$info=$this->getInfo();
			$authinfo=array();
			foreach ($info as $k=>$v){
				$authinfo[$v['auth_id']]=$v['auth_name'];
			}
			$this->assign('authinfo',$authinfo);
			$this->display();
		}
	}
	//获取所有权限列表
	function getInfo($flag=true){
		if ($flag==false){
			
		}
		$info=D('auth')->order('auth_path')->select();
		foreach ($info as $k=>$v){
			if($v['auth_level']>0){
				$info[$k]['auth_name']=str_repeat('-->',$v['auth_level']).$info[$k]['auth_name'];
			}
		}
		return $info;
	}
	
	
	
	
	
	
	
	
}