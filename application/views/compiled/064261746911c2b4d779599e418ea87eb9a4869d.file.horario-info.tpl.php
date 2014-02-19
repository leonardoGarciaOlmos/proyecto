<?php /* Smarty version Smarty-3.1.14, created on 2014-02-18 23:07:30
         compiled from "application\views\templates\horario-info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204855303e7b2334774-14317660%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '064261746911c2b4d779599e418ea87eb9a4869d' => 
    array (
      0 => 'application\\views\\templates\\horario-info.tpl',
      1 => 1391391998,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204855303e7b2334774-14317660',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'car' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5303e7b23ccd12_50159232',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5303e7b23ccd12_50159232')) {function content_5303e7b23ccd12_50159232($_smarty_tpl) {?><div class="main-container">
			<div class="">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												Seleccione la información del Horario
											</h4>

											<div class="space-6"></div>

											<form id="principal" style="margin-left:65px" action="" method="post">
												

													<label class="block clearfix" for="carrera">Carrera</label>
														<select id="carrera" name = "carrera" class="form-control error">
															<option value="">&nbsp;</option>
															<?php  $_smarty_tpl->tpl_vars['car'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['car']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['car']->key => $_smarty_tpl->tpl_vars['car']->value){
$_smarty_tpl->tpl_vars['car']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['car']->key;
?>
															<option value="<?php echo $_smarty_tpl->tpl_vars['car']->value['id'];?>
" pensum="<?php echo $_smarty_tpl->tpl_vars['car']->value['pensum_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['car']->value['nombre'];?>
</option>
															<?php } ?>  
														</select>

													<label class="block clearfix" for="semestre">Semestre</label>
														<select id="semestre" name = "semestre" class="form-control col-xs-3">
															<option value="">&nbsp;</option>
														</select>

													<div class="space"></div>

												
											</form>

										<div id="error" class="alert alert-danger" style="display:none">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>

											<strong>
												<i class="icon-remove"></i>
												Disculpe! 
											</strong>

											Debe seleccionar semestre y carrera antes de continuar.
											<br>
										</div>

										<div id="errorEmpty" class="alert alert-danger" style="display:none">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>

											<strong>
												<i class="icon-remove"></i>
												Disculpe! 
											</strong>

											El semestre que ha seleccionado no tiene informacion disponible.
											<br>
										</div>

										</div><!-- /widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a id="c_horario" class="forgot-password-link">
													<i class="icon-arrow-left"></i>
													Consultar Horario
												</a>
											</div>

											<div>
												<a id="g_horario" class="user-signup-link">
													Generar Horario
													<i class="icon-arrow-right"></i>
												</a>
											</div>
										</div>
									</div><!-- /widget-body -->
								</div><!-- /login-box -->
							</div><!-- /position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
		</div><?php }} ?>