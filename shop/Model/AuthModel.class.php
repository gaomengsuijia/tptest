<?php
//权限模型
namespace Model;
use Think\Model;
class AuthModel extends Model{
	function auth_save($post){
		//先插入数据,然后在根据插入的数据更新全路径和级别
		$auth_id=$this->add($post);
		if($post['auth_pid']==0){
			$auth_path=$auth_id;
		}else{
			$p_auth_info=$this->find($post['auth_pid']);
			$p_auth_path=$p_auth_info['auth_path'];//父级的全路径
			$auth_path=$p_auth_path.'-'.$auth_id;
		}
		$auth_level=count(explode('-',$auth_path))-1;
		$auth_up=array(
				'auth_id'=>$auth_id,
				'auth_path'=>$auth_path,
				'auth_level'=>$auth_level,
		);
		return $this->save($auth_up);
	}
	
	
	
}