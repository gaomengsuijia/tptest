<?php

//后台管理员控制器
//命名空间
namespace Admin\Controller;
use Think\Controller;

class ManagerController extends Controller{
    function login(){
        //display()没有参数，那么获得的模板名称与当前操作的名称一致
        //display('hello');   Admin/View/Manager/hello.html
      // show_bug(L());
    	$message=array();
      if(!empty($_POST)){
      	//验证码校验
      	//show_bug($_POST);
 		
      	$VerifyIMG=new \Think\Verify();
      	if(!$VerifyIMG->check($_POST['captcha'])){
      		//echo '验证码错误';
      		 $message[0]='验证码错误';
      		
      	}else {
      		//echo '验证码正确';
      		$user = new \Model\ManagerModel();
      		$result=$user->CheckUP($_POST['admin_user'],$_POST['admin_psd']);
      		if ($result!=false){
      			//show_bug($result);exit();
      			session('username',$result['mg_name']);
      			session('user_id',$result['mg_id']);
      		
      			//跳转方法
      			$this->redirect('Index/index');
      		}else {
      			
      			//echo '用户名或者密码错误';
      			 $message[0]='用户名或者密码错误';
      		}
      	}
      }
		$this->assign('message',$message);      
    	$this->assign('lang',L());//将语言传递到模板
        $this -> display();
       
    }
    //登出
    function LogOut(){
    	//session('username');
    	//session('user_id');
    	//或者sesson(null);清除全部的session
    	session(null);
    	$this->redirect('Manager/login');
    }
    //生成验证码
    function verifyIMG(){
    	$config=array(
    			'imageH'    => 24,               // 验证码图片高度
    			'imageW'    => 105,               // 验证码图片宽度
    			'length'    => 4,               // 验证码位数
    			'fontttf'   => '4.ttf',              // 验证码字体，不设置随机获取
    			'fontSize'  => 13,              // 验证码字体大小(px)
    	);
    	$verifyIMG=new \Think\Verify($config);
    	$verifyIMG->entry();
    }
    //管理员列表
    function  showlist(){
    	$info=D('manager')->where('mg_id>1')->select();
    	$rinfo=$this->getRoleINfo();
    	$this->assign('info',$info);
    	$this->assign('rinfo',$rinfo);
    	$this->display();
    }
    //变成一维数组 array('role_id'=>'role_name');
    function getRoleINfo(){
    	$roleInfo=D('role')->select();
    	$rinfo=array();
    	foreach ($roleInfo as $k=>$v){
    		$rinfo[$v['role_id']]=$v['role_name'];
    	}
    	
    	return $rinfo;
    }
    
    function upd($mg_id){
    	if(!empty($_POST)){
    		$mg_info=D('Manager');
    		$mg_info->create();
    		$s=$mg_info->save($_POST);
    		if ($s){
    			$this->success('添加管理员成功',U('showlist'));
    		}else if($s==0){
    			$this->success('数据未修改',U('showlist'));
    		}else {
    			$this->error('添加管理员失败,请重试',U('showlist'));
    		}
    	}else{
	    	$info=D('manager')->where('mg_id='.$mg_id)->select();
	    	$rinfo=$this->getRoleINfo();
	    	$this->assign('rinfo',$rinfo);
	    	$this->assign('info',$info);
	    	//传递管理员所属的角色id
	    	$this->assign('mg_role_id',$info[0]['mg_role_id']);
	    	$this->assign('mg_id',$mg_id);
	    	$this->display();
    	}
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
