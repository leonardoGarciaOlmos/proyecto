<div class="row-fluid">
    <h3 class="header smaller lighter green">Edicion de Notas Control de Estudios IUSPO</h3>
    <div class="table-header">
        Calificaciones cargadas en el sistema de control de estudios IUSPO
    </div>
    <table id="table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center">Cedula</th>
                <th class="center">Nombre</th>
                <th class="center">Apellido</th>
                <th class="center">Carrera</th>
                <th class="center">Semestre</th>
                <th class="center">Materia</th>
                <th class="center">Total</th>
                <th class="center">Estatus</th>
            </tr>
        </thead>

        <tbody>
                 {foreach key=key from=$notas item=datos} 
                 <tr>
                    <td class="center">{$datos.ci}</td>
                    <td class="center">{$datos.nombre}</td>
                    <td class="center">{$datos.apellido}</td>
                    <td class="center">{$datos.carrera}</td>
                    <td class="center">{$datos.semestre}</td>
                    <td class="center">{$datos.materia}</td>
                    <td class="center"><span class="editable notas" ci="{$datos.ci}" mat="{$datos.codigo}" sem="{$datos.semestre}">{$datos.total}</span></td>
                    <td class="center">{$datos.estatus}</td>
                </tr>   
                {/foreach}   
        </tbody>

        <tfoot>
        <tr>
            <th class="center">Cedula</th>
            <th class="center">Nombre</th>
            <th class="center">Apellido</th>
            <th class="center">Carrera</th>
            <th class="center">Semestre</th>
            <th class="center">Materia</th>
            <th class="center">Total</th>
            <th class="center">Estatus</th>
        </tr>
        </tfoot>
        </table>

</div>

