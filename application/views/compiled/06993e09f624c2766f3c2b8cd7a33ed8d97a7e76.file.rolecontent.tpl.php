<?php /* Smarty version Smarty-3.1.14, created on 2014-02-18 01:31:35
         compiled from "application\views\templates\rolecontent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:218425302b7f7212a04-03567156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06993e09f624c2766f3c2b8cd7a33ed8d97a7e76' => 
    array (
      0 => 'application\\views\\templates\\rolecontent.tpl',
      1 => 1391391998,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '218425302b7f7212a04-03567156',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'styles' => 0,
    'stylePath' => 0,
    'items' => 0,
    'item' => 0,
    'subItems' => 0,
    'subItem' => 0,
    'operationType' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5302b7f75fe976_03671786',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5302b7f75fe976_03671786')) {function content_5302b7f75fe976_03671786($_smarty_tpl) {?>

		<?php  $_smarty_tpl->tpl_vars['stylePath'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['stylePath']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['styles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['stylePath']->key => $_smarty_tpl->tpl_vars['stylePath']->value){
$_smarty_tpl->tpl_vars['stylePath']->_loop = true;
?>
			<link rel="stylesheet" href=<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
>
		<?php } ?>
			<div class="row-fluid">
				<div class="span6">
					<table class="table table-bordered table-hover">
				<thead>
					<th>
						
					</th>
					<th>
						Crear
					</th>
					<th>
						Leer
					</th>
					<th>
						Actualizar
					</th>
					<th>
						Borrar
					</th>
					<th>
					</th>
				</thead>

				<tbody>
					<tr class="global" data-type="controller">
						<td>

						</td>
						<td>
							<input type="checkbox" class="C">
						</td>
						<td>
							<input type="checkbox" class="R">
						</td>
						<td>
							<input type="checkbox" class="U">
						</td>
						<td>
							<input type="checkbox" class="D">
						</td>
						<td>
							<input type="checkbox" class="all">
						</td>
					</tr>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
						<tr class="controller" data-controller=<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
>
							<td style="cursor:pointer">
								<i class="icon-chevron-right"></i>
								<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

							</td>
							<td>
								<input type="checkbox" class="C">
							</td>
							<td>
								<input type="checkbox" class="R">
							</td>
							<td>
								<input type="checkbox" class="U">
							</td>
							<td>
								<input type="checkbox" class="D">
							</td>
							<td>
								<input type="checkbox" class="all">
							</td>
						</tr>
						<?php $_smarty_tpl->tpl_vars['subItems'] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value['subItems'], null, 0);?>
						<?php  $_smarty_tpl->tpl_vars['subItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['subItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['subItem']->key => $_smarty_tpl->tpl_vars['subItem']->value){
$_smarty_tpl->tpl_vars['subItem']->_loop = true;
?>
							<tr id=<?php echo $_smarty_tpl->tpl_vars['subItem']->value['id'];?>
 class="url" data-controller=<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
>
								<td class="indentedUrl">
									<?php echo $_smarty_tpl->tpl_vars['subItem']->value['name'];?>

								</td>
								<?php $_smarty_tpl->tpl_vars["operationType"] = new Smarty_variable("C-", null, 0);?>
								<td>
									<?php if (isset($_smarty_tpl->tpl_vars['subItem']->value['operations']['C'])){?>
										<input type="checkbox" class="C" name="urls[]" value=<?php echo ($_smarty_tpl->tpl_vars['operationType']->value).($_smarty_tpl->tpl_vars['subItem']->value['id']);?>
>
									<?php }else{ ?>
										<input type="checkbox" class="dis" value=<?php echo ($_smarty_tpl->tpl_vars['operationType']->value).($_smarty_tpl->tpl_vars['subItem']->value['id']);?>
 disabled>
									<?php }?>
								</td>
								<?php $_smarty_tpl->tpl_vars["operationType"] = new Smarty_variable("R-", null, 0);?>
								<td>
									<?php if (isset($_smarty_tpl->tpl_vars['subItem']->value['operations']['R'])){?>
										<input type="checkbox" class="R" name="urls[]" value=<?php echo ($_smarty_tpl->tpl_vars['operationType']->value).($_smarty_tpl->tpl_vars['subItem']->value['id']);?>
>
									<?php }else{ ?>
										<input type="checkbox" class="dis" value=<?php echo ($_smarty_tpl->tpl_vars['operationType']->value).($_smarty_tpl->tpl_vars['subItem']->value['id']);?>
 disabled>
									<?php }?>
								</td>
								<?php $_smarty_tpl->tpl_vars["operationType"] = new Smarty_variable("U-", null, 0);?>
								<td>
									<?php if (isset($_smarty_tpl->tpl_vars['subItem']->value['operations']['U'])){?>
										<input type="checkbox" class="U" name="urls[]" value=<?php echo ($_smarty_tpl->tpl_vars['operationType']->value).($_smarty_tpl->tpl_vars['subItem']->value['id']);?>
>
									<?php }else{ ?>
										<input type="checkbox" class="dis" value=<?php echo ($_smarty_tpl->tpl_vars['operationType']->value).($_smarty_tpl->tpl_vars['subItem']->value['id']);?>
 disabled>
									<?php }?>
								</td>
								<?php $_smarty_tpl->tpl_vars["operationType"] = new Smarty_variable("D-", null, 0);?>
								<td>
									<?php if (isset($_smarty_tpl->tpl_vars['subItem']->value['operations']['D'])){?>
										<input type="checkbox" class="D" name="urls[]" value=<?php echo ($_smarty_tpl->tpl_vars['operationType']->value).($_smarty_tpl->tpl_vars['subItem']->value['id']);?>
>
									<?php }else{ ?>
										<input type="checkbox" class="dis" value=<?php echo ($_smarty_tpl->tpl_vars['operationType']->value).($_smarty_tpl->tpl_vars['subItem']->value['id']);?>
 disabled>
									<?php }?>
								</td>
								<td>
									<input type="checkbox" class="all">
								</td>
							</tr>
						<?php } ?>
					<?php } ?>
				</tbody>
			</table>
				</div>
			</div>
		
<?php }} ?>