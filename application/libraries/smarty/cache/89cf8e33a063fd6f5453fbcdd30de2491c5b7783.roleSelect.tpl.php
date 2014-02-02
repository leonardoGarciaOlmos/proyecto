<?php /*%%SmartyHeaderCode:20352524332f273dde7-18534465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89cf8e33a063fd6f5453fbcdd30de2491c5b7783' => 
    array (
      0 => 'application\\views\\templates\\roleSelect.tpl',
      1 => 1378751177,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20352524332f273dde7-18534465',
  'variables' => 
  array (
    'asset' => 0,
    'roles' => 0,
    'role' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_524332f27d5f70_89669984',
  'cache_lifetime' => 120,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_524332f27d5f70_89669984')) {function content_524332f27d5f70_89669984($_smarty_tpl) {?><link rel="stylesheet" href=http://192.168.5.3/adsi_v1/assets/chosen/chosen.min.css>
<select id="roles">
			<option value=5>consultor</option>
			<option value=6>administrador</option>
	</select>


<?php }} ?>