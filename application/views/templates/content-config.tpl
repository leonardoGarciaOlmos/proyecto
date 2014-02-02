<div class="tabbable">
	<ul class="nav nav-tabs" id="myTab">
		<li class="active">
			<a data-toggle="tab" href="#cupos">
				<i class="green icon-ticket bigger-110"></i>
				Cupos de Carreras
			</a>
		</li>

		<li class="">
			<a data-toggle="tab" href="#uc">
			<i class="green icon-tasks bigger-110"></i>
				Unidades de Creditos
			</a>
		</li>

		<li class="dropdown">
			<a data-toggle="dropdown" class="dropdown-toggle" href="#">
			<i class="green icon-calendar bigger-110"></i>
				Fechas &nbsp;
				<i class="icon-caret-down bigger-110 width-auto"></i>
			</a>

			<ul class="dropdown-menu dropdown-info">
				<li>
					<a data-toggle="tab" href="#semestre">Inicio y Cierre de Semestre</a>
				</li>

				<li>
					<a data-toggle="tab" href="#notas">Inicio y Cierre de Carga de Notas</a>
				</li>

				<li>
					<a data-toggle="tab" href="#inscripcion">Inicio y Cierre de Inscripcciones</a>
				</li>
			</ul>
		</li>
	</ul>

	<div class="tab-content">
		<div id="cupos" class="tab-pane active ">
			<div class="login-container">
				<label for="carrera" class="block clearfix">Carrera:</label>
				<select id="carrera" name="carrera" placeholder="Mecanica" >
					<option>Informatica</option>
				<select/>
				<label for="num_cupos" class="block clearfix">Numero de Cupos Maximo:</label>
				<input id="num_cupos" name="num_cupos" type="number" placeholder="50" class="input-small"/>
				<div class="modal-footer">
					<button id="save_cupos" class="btn btn-success">Guardar</button>
				</div>
			</div>
		</div>

		<div id="uc" class="tab-pane">
			<div class="login-container">
				<label for="valor_uc" class="block clearfix">Valor de la Unidad de Credito:</label>
				<input id="valor_uc" name="valor_uc" type="number" placeholder="50" class="input-medium"/>
				<div class="modal-footer">
					<button id="save_udc" class="btn btn-success">Guardar</button>
				</div>
			</div>
		</div>

		<div id="semestre" class="tab-pane">
			<div class="login-container">
				<label for="tipo_sem" class="block clearfix">Tipo de Semestre:</label>
				<select id="tipo_sem" name="tipo_sem" placeholder="Mecanica" >
					<option>Pares</option>
					<option>Imapres</option>
				<select/>
				<label for="sem_ini" class="block clearfix">Inicio del Semestre:</label>
				<input id="sem_ini" name="sem_ini" type="text" placeholder="dd/mm" class="input"/>

				<label for="sem_fin" class="block clearfix">Fin del Semestre:</label>
				<input id="sem_fin" name="sem_fin" type="text" placeholder="dd/mm" class="input"/>

				<div class="modal-footer">
					<button id="save_semestre" class="btn btn-success">Guardar</button>
				</div>
			</div>
		</div>

		<div id="notas" class="tab-pane">
			<div class="login-container">
				<label for="tipo_sem_notas" class="block clearfix">Tipo de Semestre:</label>
				<select id="tipo_sem_notas" name="tipo_sem_notas" placeholder="Mecanica" >
					<option>Pares</option>
					<option>Imapres</option>
				<select/>

				<label for="dia_ini" class="block clearfix">Dia de Inicio de Semestre:</label>
				<select id="dia_ini" name="dia_ini" placeholder="" class="date-d">
				<select/>

				<label for="mes_ini" class="block clearfix">Mes de Inicio de Semestre:</label>
				<select id="mes_ini" name="mes_ini" placeholder="" class="date-m">
				<select/>

				<label for="dia_fin" class="block clearfix">Dia del fin de Semestre:</label>
				<select id="dia_fin" name="dia_fin" placeholder="" class="date-d">
				<select/>

				<label for="mes_fin" class="block clearfix">Mes del fin de Semestre:</label>
				<select id="mes_fin" name="mes_fin" placeholder="" class="date-m">
				<select/>

				<div class="modal-footer">
					<button id="save_notas" class="btn btn-success">Guardar</button>
				</div>
			</div>
		</div>

		<div id="inscripcion" class="tab-pane">
			<div class="login-container">
				<label for="tipo_sem_ins" class="block clearfix">Tipo de Semestre:</label>
				<select id="tipo_sem_ins" name="tipo_sem_ins" placeholder="Mecanica" >
					<option>Pares</option>
					<option>Imapres</option>
				<select/>
				<label for="sem_ini" class="block clearfix">Inicio de las Incripciones:</label>
				<input id="sem_ini" name="sem_ini" type="text" placeholder="dd/mm" class="input"/>

				<label for="sem_fin" class="block clearfix">Fin de las Inscripciones:</label>
				<input id="sem_fin" name="sem_fin" type="text" placeholder="dd/mm" class="input"/>

				<div class="modal-footer">
					<button id="save_inscripcion" class="btn btn-success">Guardar</button>
				</div>
			</div>
		</div>
	</div>
</div>