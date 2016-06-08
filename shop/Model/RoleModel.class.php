<?php
//角色模型
namespace Model;
use Think\Model;
class RoleModel extends Model{
	//修改Post的角色信息
	function RoleUpdata($role_id,$_Post){
		//将权限从数组形式拼凑成以逗号隔开的字符串
		$role_auth_ids=implode($_Post['auth'],',');
		//获取角色的控制器和操作方法
		$role_auth_ac_arry=D('auth')->select($role_auth_ids);
		//控制器和操作方法拼接
		foreach ($role_auth_ac_arry as $k=>$v){
			if(!empty($v['auth_c'])&&!empty($v['auth_a'])){
				$role_auth_ac.=$v['auth_c']."-".$v['auth_a'].",";
			}
		}
		$role_auth_ac=rtrim($role_auth_ac,',');
		$content=array(
			'role_id'=>$role_id,
			'role_auth_ids'=>$role_auth_ids,
			'role_auth_ac'=>$role_auth_ac		
		);
		//保存到表中
		return $this->save($content);
	}
}