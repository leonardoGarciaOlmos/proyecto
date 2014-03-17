<h1 id="title">Generador de Horarios</h1>
<hr>

<div class="alert alert-block alert-success" style="display:none">
    <button type="button" class="close" data-dismiss="alert">
        <i class="icon-remove"></i>
    </button>

    <p>
        <strong>
            <i class="icon-ok"></i>
            Listo!
        </strong>
        La informacion se agrego con exito en el horario
    </p>

    <p>
        <button onclick="location.href=base_url+'horario/principal'" class="btn btn-sm btn-success">¿Desea hacer otro Horario?</button>
        <button onclick="$('.alert-success').hide();" class="btn btn-sm">Permanecer aqui</button>
    </p>
</div>

<a id='tipo_consulta' tipo='{$tiporef}'></a>
<div class="CSSTableGenerator" >
    <table id="format" border="1">
        <thead>    
            <tr>
                <th class="day-hour ">Horas</th>
                <th class="day-hour ">Lunes</th>
                <th class="day-hour ">Martes</th>
                <th class="day-hour ">Miércoles</th>
                <th class="day-hour ">Jueves</th>
                <th class="day-hour ">Viernes</th>
            </tr>
        </thead>
        <tbody>    
            {foreach key=key from=$horas item=hora}
                <tr data-hora="{$hora.hora_inicio} - {$hora.hora_final}">
                    <td class="horas">{$hora.hora_inicio} - {$hora.hora_final}</td>
                 {foreach from=$dias.$key item=datos} 
                    <td data-dia="{$datos.dia}" id="{$datos.id}"></td>
                {/foreach}   
                
                </tr>
            {/foreach}
        </tbody>   

        <tfoot></tfoot> 
    </table>
</div>
    <hr>
    <div class="modal-footer">
        <a id="retunr" href="{$base_url}/horario/principal" class="btn" data-dismiss="modal" aria-hidden="true">Regresar</a>
        <a id="consult" href="#" class="btn" data-dismiss="modal" aria-hidden="true">Consultar</a>
        <a id="insert_data" href="#" class="btn" data-dismiss="modal" aria-hidden="true">Insertar</a>
    </div>


    <div id="modal" style="display:none" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Seleccion de informacion de Bloque</h3>
        </div>

        <div class="modal-body">
                <table id="table-modal">
                    <thead>
                        <tr>
                            <td>Seleccion</td>
                            <td>Horas No Disponibles</td>
                        </tr>
                    </thead>
                    <tbody>
                        <td> <span id="combo">
                            <h5>Materia</h5>
                            <select id="matter">
                                <option value="vacio">Seleccione Materia</option>
                            </select>
                        </span>
                        <span id="combo">
                           <h5>Docente</h5>
                           <select id="teacher">
                               <option value="vacio">Seleccione Docente</option>
                           </select>
                       </span>

                   </td>
                   <td ><div id="occupied"></div></td>
               </tbody>
             </table>   
            
            <div id="alert" class="alert alert-danger" style="display:none">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="icon-remove"></i>
                </button>
                <strong>Disculpe!</strong>
                <span id="notification"></span>
                <br>
            </div>
        </div>
        <div class="modal-footer">
            <a id='cerrar' href="#" class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</a>
            <a id='borrar' href="#" class="btn" data-dismiss="modal" aria-hidden="true">Borrar</a>
            <a id="insert_info" class="btn btn-primary">Insertar Datos</a>
        </div>
</div>


<div id="modal_sem" style="display:none" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Seleccion de seminario</h3>
    </div>

    <div class="modal-body">
        
        <select id="seminario" class="span8 center">
            <option value="vacio">Seleccione Seminario</option>
        </select>
        
        <div id="alert_sem" class="alert alert-danger" style="display:none">
            <button type="button" class="close" data-dismiss="alert">
                <i class="icon-remove"></i>
            </button>
            <strong>Disculpe!</strong>
            <span id="notification_sem"></span>
            <br>
        </div>
    </div>
    <div class="modal-footer">
        <a id='close' href="#" class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</a>
        <a id="save_sem" class="btn btn-primary">Guardar</a>
    </div>
</div>

<form method="post">
    <input id="html" name="html" type="text" value=""/>
</form>