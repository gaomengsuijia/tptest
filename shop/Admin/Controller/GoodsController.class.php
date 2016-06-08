<?php

//后台商品控制器
namespace Admin\Controller;
use Component\AdminController;

class GoodsController extends AdminController {
    //商品列表展示
    function showlist1(){
        //使用数据model模型
        //实例化model对象
        //$goods = new \Model\GoodsModel();  //object(Model\GoodsModel)
        
        //$goods = D("Goods");  //object(Think\Model)
        //$goods = D();  //object(Think\Model)
        
        $goods = M('user');//实例化Model对象，实际操作Goods数据表
        //$goods = M();  //object(Think\Model)
        
        show_bug($goods);
        
        
        $this -> display();
    }
    
    function showlist(){
        $goods = D('Goods');
		$total=$goods->count();
		$per=7;
		//实例化page类
		//$page=new \Compontent\Page($total,$listRows);//autoLoad();
		$page = new \Component\Page($total, $per); //autoload
		//3. 拼装sql语句获得每页信息
		$sql = "select * from sw_goods ".$page->limit;
		$info = $goods -> query($sql);
		//4. 获得页码列表
		$pagelist = $page -> fpage();
		
       // $info = $goods -> select();//获得数据信息
        //把数据assign到模板
        //价格大于1000元的商品
        //where(内部$this,return $this)
        //$('div').css('color','red').css('font-size','30px')
       // $info = $goods -> where("goods_price > 1000 and goods_name like '索%'")->select();
        //查询指定的字段
        //$info = $goods->field("goods_id,goods_name")->select();
        //限制条数
       // $info = $goods->limit(10,5)->select();
        //分组查询group by
        //查询当前商品一共的分组信息
        //通过分组设置可以查询每个分组的商品信息
        //例如：每个分组下边有多少商品信息  
        //      select category_id,count(*) from table group by category_id
        //      每个分组下边商品的价格算术和是多少
        //      select category_id,sum(price) from table group by category_id
        //$info = $goods->field('goods_category_id')->select(); //有重复的
        //$info = $goods ->field('goods_category_id')-> group('goods_category_id')->select();
        //show_bug($info);
        //排序显示结果order by goods_price desc
        //$info = $goods ->order('goods_price asc')-> select();
        
        $this -> assign('info', $info);//把数据传到模板中去
        $this->assign('pagelist',$pagelist);
        
        $this -> display();
    }
    function showlist2(){
    	$Goods=D('Goods');
    	//$data=$Goods->select();
    	//$data=$Goods->where('goods_price > 1000')->select();
    	//$data=$Goods->group('goods_category_id')->having('goods_category_id > 5')->select();
    	//$data=$Goods->count('*');
    	$sql="select * from sw_goods";
    	$sm=$Goods->query($sql);
    	show_bug($sm);
    }
    
    //添加商品
    function add1(){
    	$Goods=D("Goods");
    	//利用数组方式添加数据
    	/*$arry=array(
			'goods_name'=>'iphone5',
    		'goods_price'=>1000,
    	);
    	$return_data=$Goods->add($arry);*/
    	//利用AR方式添加数据
    	$Goods->goods_name='htc';
    	$Goods->goods_price=1000;
    	$return_data=$Goods->add();
    	show_bug($return_data);
    	if($return_data>0){
    		echo 'sucess';
    	}else {
    		echo 'failure';
    	}
        $this -> display();
    }
    function add(){
    	
    	$Goods=D('Goods');
    	if(!empty($_POST)){
    		if(!empty($_FILES)){
    			$config=array(
    					'rootPath'      =>     './public/', //保存根路径
    					'savePath'      =>  'Uploads/', //保存路径
    			);
    			$UpLoad_Img=new \Think\Upload($config);
    			$UpLoad_Img_re=$UpLoad_Img->uploadOne($_FILES['goods_Img']);
    			if($UpLoad_Img_re===false){
    				show_bug($UpLoad_Img->getError());
    			}else {
    				//show_bug($UpLoad_Img_re);
    				$Img_URL=$UpLoad_Img_re['savepath'].$UpLoad_Img_re['savename'];
    				$_POST['goods_big_img']=$Img_URL;
    			}
    			//生成图片缩略图
    			$Small_Img=new \Think\Image();
    			//打开将要缩略的图
    			$imgname=$UpLoad_Img->rootPath.$Img_URL;
    			$Small_Img->open($imgname);
    			//生成缩略图片
    			$Small_Img->thumb(120,120);
    			//保存缩略图
    			$Img_small_URL=$UpLoad_Img_re['savepath'].'small_'.$UpLoad_Img_re['savename'];
    			//通过$Upload_Img类的_get()方法可以直接调用rootPath;
    			$Small_Img->save($UpLoad_Img->rootPath.$Img_small_URL);
    			$_POST['goods_small_img']=$Img_small_URL;
    		}
    		
    		$Goods->create();
    		$data=$Goods->add();
    		if($data){
    			echo 'sucess';
    		}else {
    			echo 'fail';
    		}
    	}else{
    		
    	}
    	$this->display();
    }
    
    //修改商品
    function upd1(){
        //var_dump(get_defined_constants(true));
        $Goods=D('Goods');
        //$arry=array('goods_id'=>60,'goods_name'=>'黑莓','goods_price'=>1000);
        //$data=$Goods->save($arry);
        //数组方式修改
       // $arry=array('goods_name'=>'黑莓','goods_price'=>1000);
       // $data= $Goods->where('goods_price>1000')->save($arry);
        //AR方式修改
        $Goods->goods_name='诺基亚';
        $Goods->goods_price=100;
        $data=$Goods->where('goods_price>800')->save();
        $this -> display();
    }
    function upd($goods_id){
    	//echo __SELF__;
    	$Goods=D('Goods');
    	if(!empty($_POST)){
    		//show_bug($_POST);
    		$Goods->create();
    		//使用where方法
    		//$data=$Goods->where("goods_id={$goods_id}")->save();
    		//在模板中添加隐藏的goods_id也可以
    		$data=$Goods->save();
    		if($data){
    			echo 'sucess';
    		}else {
    			echo 'failure';
    		}
    	}else {
    		$info=$Goods->find($goods_id);
    		$this->assign("info",$info);
    		$this->display();
    	}
    	
    }
    function del(){
    	$Goods=D("Goods");
    	//$msg=$Goods->delete(61);
    	$sql="delete from sw_goods where goods_id=59";
    	$msg=$Goods->execute($sql);
    	show_bug($msg);
    }
    
    function getMoney(){
        return "1000元钱";
    }
    //设置缓存
    function s1(){
    	S('name','tom');
    	S('age','29');
    	S('address','永州');
    	echo 'success';
    }
    //获取缓存
    function s2(){
    	echo S('name');
    	echo S('age');
    	echo S('address');
    }
    //删除缓存
    function s3(){
    	S('name',null);
    }
    //实际项目中的缓存用法,一个方法是用作用户获取缓存,另一个是设置缓存,供很多方法使用
    function s4(){
    	echo $this->s5();
    }
    function s5(){
    	//从缓存中读取数据
    	$data=S('name');
    	if($data){
    		return $data;
    	}else{
    		//从数据库中读取数据
    		//模拟从数据库中得到数据
    		$data='goushi'.time();
    		S('name',$data,10);  
    		return $data;
    	}
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

