<?php /* Smarty version Smarty-3.1.14, created on 2014-02-02 20:52:31
         compiled from "application\views\templates\perfil-docente.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1071952eeb00f45bc45-97938068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6215fd4cf08cf862314d587fb0f03c992167408' => 
    array (
      0 => 'application\\views\\templates\\perfil-docente.tpl',
      1 => 1391266576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1071952eeb00f45bc45-97938068',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'userData' => 0,
    'carreras' => 0,
    'car' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52eeb00f4daff5_56612088',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52eeb00f4daff5_56612088')) {function content_52eeb00f4daff5_56612088($_smarty_tpl) {?><div class="span12">
	<div class="widget-box">
		<div class="widget-header header-color-blue2">
			<h4 class="lighter smaller">Perfil del Docente</h4>
		</div>

		<div class="widget-body">

			<div class= "widget-main padding-8">
				<div class="profile-user-info profile-user-info-striped">
					<div class="profile-info-row">
						<div class="profile-info-name"> Usuario </div>

						<div class="profile-info-value">
							<span class="editable editable-click" id="username"><?php echo $_smarty_tpl->tpl_vars['userData']->value["nombre"];?>
 <?php echo $_smarty_tpl->tpl_vars['userData']->value["apellido"];?>
</span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> Direccion </div>

						<div class="profile-info-value">
							<i class="icon-map-marker light-orange bigger-110"></i>
							<span class="editable editable-click" id="country"><?php echo $_smarty_tpl->tpl_vars['userData']->value["direccion"];?>
</span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> Fecha Nac. </div>

						<div class="profile-info-value">
							<span class="editable editable-click" id="age"><?php echo $_smarty_tpl->tpl_vars['userData']->value["fecha_nac"];?>
</span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> E-mail </div>

						<div class="profile-info-value">
							<span class="editable editable-click" id="signup"><?php echo $_smarty_tpl->tpl_vars['userData']->value["correo"];?>
</span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> Expediente </div>

						<div class="profile-info-value">
							<span class="editable editable-click" id="login"><?php echo $_smarty_tpl->tpl_vars['userData']->value["expediente"];?>
</span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> Instruccion </div>

						<div class="profile-info-value">
							<span class="editable editable-click" id="about"><?php echo $_smarty_tpl->tpl_vars['userData']->value["nivel_instruccion"];?>
.</span>
						</div>
					</div>
				</div>
			</div>

			<div class="page-header">
				<h1>
					Perfil
					<small>
						<i class="icon-double-angle-right"></i>
						Informacion Academica
					</small>
				</h1>
			</div>
		
			<div class="row-fluid">
				<div class="span6">
					<div class="alert alert-block alert-success" style="display:none" id="alert1">
						    <button type="button" class="close" data-dismiss="alert">
						        <i class="icon-remove"></i>
						    </button>
						    <p><strong>
						            <i class="icon-ok"></i>
						            Listo!
						        </strong>
						        La informacion se agrego con exito en el perfil</p>
						</div>

						<form class="" role="form" style="padding-left: 80px; padding-right: 80px;">
							<div class="space-4"></div>

								<div class="form-group">
									<label for="carrera">Carrera</label>

									<select id="carrera">
										<option value="">&nbsp;</option>
										<?php  $_smarty_tpl->tpl_vars['car'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['car']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['carreras']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['car']->key => $_smarty_tpl->tpl_vars['car']->value){
$_smarty_tpl->tpl_vars['car']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['car']->key;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['car']->value['id'];?>
" carrera="<?php echo $_smarty_tpl->tpl_vars['car']->value['nombre'];?>
"><?php echo $_smarty_tpl->tpl_vars['car']->value['nombre'];?>
</option>
										<?php } ?>
									</select>

									<label class="col-sm-3 control-label" for="materias" style="padding-right: 10px">Materia</label>

									<div class="col-sm-9">
										<select multiple class="chosen-select tag-input-style" id="materias" data-placeholder="Escoja su Materia">
											<option value="AL">Alabama</option>
											<option value="AK">Alaska</option>
										</select>
									</div>
								</div>

						</form>
						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-info" type="button" id="guardar">
									<i class="icon-ok bigger-110"></i>
									Guardar
								</button>
							</div>
						</div>
				</div>

				<div class="span6">
					<div class="space-4"></div><div class="space-4"></div>
						<div class="alert alert-block alert-success" style="display:none" id ="alert2">
						    <button type="button" class="close" data-dismiss="alert">
						        <i class="icon-remove"></i>
						    </button>
						    <p><strong>
						            <i class="icon-ok"></i>
						            Listo!
						        </strong>
						        La informacion se elimino con exito en el perfil</p>
						</div>

						<form style="padding-left: 80px; padding-right: 80px;">
							<label for="c_materias">Multiple</label>

							<select class="form-control" id="c_materias" multiple="multiple">

							</select>

						</form>

						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-danger" type="button" id="eliminar">
									<i class="icon-trash bigger-110"></i>
									Eliminar
								</button>
							</div>
						</div>
						
				</div>

			</div>

						


			
		</div>
	</div>



</div>








<?php }} ?>