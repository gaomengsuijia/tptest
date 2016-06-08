<?php /* Smarty version Smarty-3.1.6, created on 2016-01-18 23:37:13
         compiled from "C:/wamp/www/1122/shop/Admin/View\Role\add.html" */ ?>
<?php /*%%SmartyHeaderCode:11338569d06a9ab2fd2-72805359%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf7b977fdf102dba1eaa944956aeb318bc8460b2' => 
    array (
      0 => 'C:/wamp/www/1122/shop/Admin/View\\Role\\add.html',
      1 => 1453131421,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11338569d06a9ab2fd2-72805359',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_569d06a9b75d5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569d06a9b75d5')) {function content_569d06a9b75d5($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加角色</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="<?php echo @ADMIN_CSS_URL;?>
mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：角色管理-》添加角色信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo @__MODULE__;?>
/Goods/showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="<?php echo @__SELF__;?>
" method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>角色名称</td>
                    <td><input type="text" name="role_name" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="添加角色">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>
<?php }} ?>