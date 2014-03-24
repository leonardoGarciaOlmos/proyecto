<div class="row-fluid">
    <h3 class="header smaller lighter green">Reporte de Estudiantes por Carrera Control de Estudios IUSPO</h3>
    <div class="table-header">
        Informacion de los estudiantes registrados.
    </div>
    <table id="table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center">Cedula</th>
                <th class="center">Nombre</th>
                <th class="center">Apellido</th>
                <th class="center">Estado Civil</th>
                <th class="center">Sexo</th>
                <th class="center">Nivel de Instruccion</th>
                <th class="center">Direccion</th>
                <th class="center">Carrera</th>
            </tr>
        </thead>

        <tbody>
                 {foreach key=key from=$data item=datos} 
                 <tr>
                    <td class="center">{$datos.ci}</td>
                    <td class="center">{$datos.nombre}</td>
                    <td class="center">{$datos.apellido}</td>
                    <td class="center">{$datos.est_civil}</td>
                    <td class="center">{$datos.sexo}</td>
                    <td class="center">{$datos.nivel_instruccion}</td>
                    <td class="center">{$datos.direccion}</td>
                    <td class="center">{$datos.carrera}</td>
                </tr>   
                {/foreach}   
        </tbody>

        <tfoot>
        <tr>
            <th class="center">Cedula</th>
            <th class="center">Nombre</th>
            <th class="center">Apellido</th>
            <th class="center">Estado Civil</th>
            <th class="center">Sexo</th>
            <th class="center">Nivel de Instruccion</th>
            <th class="center">Direccion</th>
            <th class="center">Carrera</th>
        </tr>
        </tfoot>
        </table>

</div>

