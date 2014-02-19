<?php /* Smarty version Smarty-3.1.14, created on 2014-02-19 02:30:33
         compiled from "application\views\templates\wizard_pensum.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3001852fec62a9279a1-04637249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fddd466fe6413832e8bcd4a202b5b88abee43c06' => 
    array (
      0 => 'application\\views\\templates\\wizard_pensum.tpl',
      1 => 1392762276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3001852fec62a9279a1-04637249',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52fec62ad0fa98_75564996',
  'variables' => 
  array (
    'process' => 0,
    'pensum' => 0,
    'semestre' => 0,
    'career' => 0,
    'title' => 0,
    'depart' => 0,
    'item' => 0,
    'num' => 0,
    'materia' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fec62ad0fa98_75564996')) {function content_52fec62ad0fa98_75564996($_smarty_tpl) {?><html class="">

	<?php if ($_smarty_tpl->tpl_vars['process']->value=="add"){?>
		<input type="hidden" id="pensum" value="0">
		<input type="hidden" id="num_semestre" value="0">
		<input type="hidden" id="carrera" value="0">
	<?php }elseif($_smarty_tpl->tpl_vars['process']->value=="update"){?>
		<input type="hidden" id="pensum" value="<?php echo $_smarty_tpl->tpl_vars['pensum']->value;?>
">
		<input type="hidden" id="num_semestre" value="<?php echo $_smarty_tpl->tpl_vars['semestre']->value;?>
">
		<input type="hidden" id="carrera" value="<?php echo $_smarty_tpl->tpl_vars['career']->value['id'];?>
">
	<?php }?>


	<div class="widget-box">
		<div class="widget-header widget-header-blue widget-header-flat">
			<h4 class="lighter"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h4>
		</div>

		<div class="widget-body">
			<div class="widget-main">

				<div id="MyWizard" class="row-fluid wizard">
					<ul class="steps wizard-steps">
						<li data-target="#step1" class="active" style="min-width: 25%; max-width: 25%;">
							<span class="step">1</span>
							<span class="title">Seleccionar Carrea</span>
						</li>

						<li data-target="#step2" class="" style="min-width: 25%; max-width: 25%;">
							<span class="step">2</span>
							<span class="title">Añadir Materia</span>
						</li>

						<li data-target="#step3" class="" style="min-width: 25%; max-width: 25%;">
							<span class="step">3</span>
							<span class="title">Verificar Pensum</span>
						</li>

						<li data-target="#step4" class="" style="min-width: 25%; max-width: 25%;">
							<span class="step">4</span>
							<span class="title">Finalizar</span>
						</li>
					</ul>

				</div>

				<div class="step-content">
					<hr>

					<div class="step-pane active" id="step1">
						<h3 class="lighter block green">Seleccione la carrera de su preferencia</h3>
						<div class="center">
						<?php if ($_smarty_tpl->tpl_vars['process']->value=="add"){?>
							<h3>Departamento</h3>
							<select id="select_departamento">
								<option value="">Seleccionar departamento</option>
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['depart']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
</option>
								<?php } ?>
							</select>

							<h3>Carrera</h3>
							<select disabled="disabled" id="select_carrera">
								<option value="">...</option>
							</select>
						
						<?php }elseif($_smarty_tpl->tpl_vars['process']->value=="update"){?>
							<h3>Departamento</h3>
							<select id="select_departamento" disabled="disabled">
								<option value="<?php echo $_smarty_tpl->tpl_vars['depart']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['depart']->value['nombre'];?>
</option>
							</select>

							<h3>Carrera</h3>
							<select disabled="disabled" id="select_carrera" disabled="disabled">
								<option value="<?php echo $_smarty_tpl->tpl_vars['career']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['career']->value['nombre'];?>
</option>
							</select>
						<?php }?>
						</div>
					</div>


					<div class="step-pane" id="step2">
						<div class="row-fluid">
							<div class="span9">
								<h3 class="lighter block green">Agregar las materias a cada semestre</h3>
							</div>
							<div class="span3">
								<button class="btn btn-primary" name="agregarSemes" id="addSemes">
									<i class="icon-plus icon-white"></i> Agregar Semestre
								</button>
							</div>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['process']->value=="add"){?>
							<div id="accordion2" class="accordion">
								<h4>No existe semestre ni materia</h4>
							</div>
						
						<?php }elseif($_smarty_tpl->tpl_vars['process']->value=="update"){?>
							<div id="accordion2" class="accordion">
								<?php $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['num']->step = 1;$_smarty_tpl->tpl_vars['num']->total = (int)ceil(($_smarty_tpl->tpl_vars['num']->step > 0 ? $_smarty_tpl->tpl_vars['semestre']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['semestre']->value)+1)/abs($_smarty_tpl->tpl_vars['num']->step));
if ($_smarty_tpl->tpl_vars['num']->total > 0){
for ($_smarty_tpl->tpl_vars['num']->value = 1, $_smarty_tpl->tpl_vars['num']->iteration = 1;$_smarty_tpl->tpl_vars['num']->iteration <= $_smarty_tpl->tpl_vars['num']->total;$_smarty_tpl->tpl_vars['num']->value += $_smarty_tpl->tpl_vars['num']->step, $_smarty_tpl->tpl_vars['num']->iteration++){
$_smarty_tpl->tpl_vars['num']->first = $_smarty_tpl->tpl_vars['num']->iteration == 1;$_smarty_tpl->tpl_vars['num']->last = $_smarty_tpl->tpl_vars['num']->iteration == $_smarty_tpl->tpl_vars['num']->total;?>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapse<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
												<span style="font-size: 16px;">Semestre #<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
</span>
											</a>
										</div>

										<div class="accordion-body collapse" id="collapse<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
">
											<div class="accordion-inner">
												<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
", name="semestre" id="semestre">
												<input type="hidden" value="" name="materia_id" id="materia_id">
												<div class="span1"> <h4>Materia</h4> </div>
												<div class="span3"> <input type="text" value="" name="materia" id="materia"> </div>
												<div class="span12">
													<table class="table table-striped table-bordered table-hover" id="tableMateria">
														<tr>
															<th><h5>Codigo</h5></th>
															<th><h5>Uni. Curricular</h5></th>
															<th class="hidden-phone"><h5>H. Teoricas</h5></th>
															<th class="hidden-phone"><h5>H. Practicas</h5></th>
															<th class="hidden-phone"><h5>Total Horas</h5></th>
															<th class="hidden-480"><h5>Uni. Credito</h5></th>
															<th class="hidden-480"><h5>Cod. Prelacion</h5></th>
															<th></th>
														</tr>
														<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['materia']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
															<?php if ($_smarty_tpl->tpl_vars['item']->value['semestre']==$_smarty_tpl->tpl_vars['num']->value){?>
																<tr>
																	<th><?php echo $_smarty_tpl->tpl_vars['item']->value['codigo'];?>
</th>
																	<th><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
</th>
																	<th class="hidden-phone"><?php echo $_smarty_tpl->tpl_vars['item']->value['horas_teoricas'];?>
</th>
																	<th class="hidden-phone"><?php echo $_smarty_tpl->tpl_vars['item']->value['horas_practicas'];?>
</th>
																	<th class="hidden-phone"><?php echo $_smarty_tpl->tpl_vars['item']->value['total_horas'];?>
</th>
																	<th class="hidden-480"><?php echo $_smarty_tpl->tpl_vars['item']->value['uni_credito'];?>
</th>
																	<th class="hidden-480"><?php echo $_smarty_tpl->tpl_vars['item']->value['cod_prelacion'];?>
</th>
																	<th><button class="btn btn-mini btn-danger" id="eliminarMat" type="button" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['codigo'];?>
"><i class="icon-remove-sign"></i></th>
																</tr>
															<?php }?>
														<?php } ?>
													</table>
												</div>
											</div>
										</div>
									</div>
								<?php }} ?>
							</div>
						<?php }?>
					</div>
					

					<div class="step-pane" id="step3">
						<div class="row-fluid">
							<div class="span8">
								<h3 class="lighter block green">Verificar la información del Pensum</h3>
							</div>
						</div>

						<div class="row-fluid">
							<div class="span12" id="view_pensum">
								<h4>No existe semestre ni materia</h4>
							</div>
						</div>

						<div class="row-fluid" style="padding-top: 15px;">
							<div class="span4">
								<label>
									<input name="form-field-checkbox" type="checkbox" class="ace" id="VerificarPensum">
									<span class="lbl"> Acepto que la información es correcta</span>
								</label>
							</div>
						</div>

					</div>

					<div class="step-pane" id="step4">
						<div class="row-fluid">
							<div class="span12 center">
								<h3 class="green">Felicidades!</h3>
								Ha culminado el proceso creación del pensum, precione finalizar!
							</div>
						</div>
					</div>
				</div>

				<div class="row-fluid wizard-actions">
					<hr>
					<button class="btn btn-prev" id="prev">
						<i class="icon-arrow-left"></i>
						Prev
					</button>

					<button class="btn btn-success btn-next" data-last="Finish" id="next">
						Sign
						<i class="icon-arrow-right icon-on-right"></i>
					</button>
				</div>

			</div>
		</div>
	</div>

	
</html><?php }} ?>