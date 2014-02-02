<?php /* Smarty version Smarty-3.1.14, created on 2014-02-02 19:35:02
         compiled from "application\views\templates\roleSelect.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2414752ee9de63f3dc0-72154426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89cf8e33a063fd6f5453fbcdd30de2491c5b7783' => 
    array (
      0 => 'application\\views\\templates\\roleSelect.tpl',
      1 => 1382624041,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2414752ee9de63f3dc0-72154426',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'asset' => 0,
    'roles' => 0,
    'role' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52ee9de644ae29_64616829',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ee9de644ae29_64616829')) {function content_52ee9de644ae29_64616829($_smarty_tpl) {?><link rel="stylesheet" href=<?php echo ($_smarty_tpl->tpl_vars['asset']->value).("/chosen/chosen.min.css");?>
>
<select id="roles">
	<?php  $_smarty_tpl->tpl_vars['role'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['role']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['roles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['role']->key => $_smarty_tpl->tpl_vars['role']->value){
$_smarty_tpl->tpl_vars['role']->_loop = true;
?>
		<option value=<?php echo $_smarty_tpl->tpl_vars['role']->value['id'];?>
><?php echo $_smarty_tpl->tpl_vars['role']->value['name'];?>
</option>
	<?php } ?>
</select>


<?php }} ?>