<?php /* Smarty version Smarty-3.1.6, created on 2016-01-20 21:07:57
         compiled from "C:/wamp/www/1122/shop/Admin/View\Manager\showlist.html" */ ?>
<?php /*%%SmartyHeaderCode:18220569e51580dbf61-79552585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ad20a2f68c652b5ca4386e45eb9cc0f0ed3ca6e' => 
    array (
      0 => 'C:/wamp/www/1122/shop/Admin/View\\Manager\\showlist.html',
      1 => 1453295271,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18220569e51580dbf61-79552585',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_569e51581cbbe',
  'variables' => 
  array (
    'info' => 0,
    'v' => 0,
    'rinfo' => 0,
    'pagelist' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569e51581cbbe')) {function content_569e51581cbbe($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>管理员列表</title>

        <link href="<?php echo @ADMIN_CSS_URL;?>
mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            
            .tr_color{background-color: #9F88FF}
            
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：管理员管理-》管理员列表</span>
            </span>
        </div>
        <div></div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>管理员名称</td>
                        <td>管理员角色</td>
                        <td>操作</td>
                    </tr>
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['info']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['v']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
 $_smarty_tpl->tpl_vars['v']->iteration++;
?>
                    <tr id="product1">
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->iteration;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['mg_name'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['rinfo']->value[$_smarty_tpl->tpl_vars['v']->value['mg_role_id']];?>
</td>
                        <td><a href="<?php echo @__CONTROLLER__;?>
/upd/mg_id/<?php echo $_smarty_tpl->tpl_vars['v']->value['mg_id'];?>
">修改</a></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="20" style="text-align: center;">
                            <?php echo $_smarty_tpl->tpl_vars['pagelist']->value;?>

                           
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html><?php }} ?>