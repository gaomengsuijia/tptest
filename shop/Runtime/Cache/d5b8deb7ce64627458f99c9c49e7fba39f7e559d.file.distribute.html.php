<?php /* Smarty version Smarty-3.1.6, created on 2016-01-17 02:56:04
         compiled from "C:/wamp/www/1122/shop/Admin/View\Role\distribute.html" */ ?>
<?php /*%%SmartyHeaderCode:19799569a7a327d0634-12471715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5b8deb7ce64627458f99c9c49e7fba39f7e559d' => 
    array (
      0 => 'C:/wamp/www/1122/shop/Admin/View\\Role\\distribute.html',
      1 => 1452970557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19799569a7a327d0634-12471715',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_569a7a32878fb',
  'variables' => 
  array (
    'role_name' => 0,
    'auth_top' => 0,
    'v' => 0,
    'role_auth_ids_arr' => 0,
    'auth_ci' => 0,
    'vv' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569a7a32878fb')) {function content_569a7a32878fb($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加权限</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="<?php echo @ADMIN_CSS_URL;?>
mine.css" type="text/css" rel="stylesheet">
        <style type="text/css">
            
            li{list-style: none;}
            
        </style>
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：权限管理-》添加权限信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo @__MODULE__;?>
/Role/showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>
		<div>正在为角色<span style="font-size:20px;font-weight:bolder"> <?php echo $_smarty_tpl->tpl_vars['role_name']->value;?>
 </span>添加权限:</div>
        <div style="font-size: 13px;margin: 10px 5px">
            <form action="<?php echo @__SELF__;?>
" method="post" enctype="multipart/form-data">
            <ul>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['auth_top']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            	<li><?php echo $_smarty_tpl->tpl_vars['v']->value['auth_name'];?>
<input type="checkbox" name="auth[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['auth_id'];?>
"  
            	<?php if (in_array($_smarty_tpl->tpl_vars['v']->value['auth_id'],$_smarty_tpl->tpl_vars['role_auth_ids_arr']->value)){?> checked="checked"<?php }?>/>
            		<ul>
            		<?php  $_smarty_tpl->tpl_vars['vv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vv']->_loop = false;
 $_smarty_tpl->tpl_vars['kk'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['auth_ci']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vv']->key => $_smarty_tpl->tpl_vars['vv']->value){
$_smarty_tpl->tpl_vars['vv']->_loop = true;
 $_smarty_tpl->tpl_vars['kk']->value = $_smarty_tpl->tpl_vars['vv']->key;
?>
            		<?php if ($_smarty_tpl->tpl_vars['vv']->value['auth_pid']==$_smarty_tpl->tpl_vars['v']->value['auth_id']){?>
            			<li><?php echo $_smarty_tpl->tpl_vars['vv']->value['auth_name'];?>
<input type="checkbox" name="auth[]" value="<?php echo $_smarty_tpl->tpl_vars['vv']->value['auth_id'];?>
" 
            			<?php if (in_array($_smarty_tpl->tpl_vars['vv']->value['auth_id'],$_smarty_tpl->tpl_vars['role_auth_ids_arr']->value)){?> checked="checked"<?php }?>/></li>
            		<?php }?>	
            		<?php } ?>	
            		</ul>
            	</li>
            <?php } ?>	
            </ul>
            <input type="submit" name="submit" value="修改权限"/>
            </form>
        </div>
    </body>
</html>
<?php }} ?>