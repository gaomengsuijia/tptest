<?php

namespace Home\Controller;
use Think\Controller;

//Controller父类：ThinkPHP/Library/Think/Controller.class.php

class UserController extends Controller{
    //用户登录
    function login(){
        //调用视图display();
        $this -> display();
    }

    //用户注册
    function register(){
    	//$user=new \Model\UserModel();
    	show_bug($_POST);
    	$user = new \Model\UserModel();
    	if(!empty($_POST)){
    		//print_r($_POST);
    		$data=$user->create();//集成表单验证
    		if(!$data){
    			show_bug($user->getError());
    		}else {
    			//添加数据
    			$user->user_hobby=implode(',',$_POST['user_hobby']);
    			$charu=$user->add();
    			if($charu){
    				$this->success('注册成功',U('Index/index'));
    			}else {
    				$this->error('注册失败',U('Index/index'));	 
    			}
    		}
    		
    	}else {
    		$this -> display();
    	}
    	
       
    }
    
    function _empty(){
        echo "<img src='".IMG_URL.'404.gif'."' alt='' />";
    }
    
    function number(){
        //模仿从数据库获得数据
        //return "目前网站注册会员200万";
$html=<<<GS
<html>
<body>
<p>吃屎吧</p>
</body>
</html>        
GS;
echo $html;
    }
}

