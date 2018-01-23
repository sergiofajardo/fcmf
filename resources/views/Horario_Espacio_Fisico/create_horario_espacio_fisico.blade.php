@extends('admin.index')

@section('content')

@if(Auth::user()->role_id ==1)
 
<div class="container">
    <div class="row">
   
             <div style="width: 100%;height: 100%;">
                <div class="panel panel-default">
                    <div class="panel-body" style="align-content: center; width:90%; margin-right: 5%; margin-left: 5%; ">
                        <div class="form-group">
             
                    {!! Form::open(['route'=>'admin.horario.store','files'=>'true','enctype'=>'multipart/form-data']) !!}
                           <label> Seleccione la Facultad para cargar las carreras:</label><br/> 
                              <select style="width: 70%;"  name="faculties_id" id="faculties_id" onchange="setear_periodo();" >
                                <option value="0">Seleccione una Facultad</option>
                                   @foreach($faculties as $faculty)
                                <option value="{{$faculty->id}}">{{ $faculty->name}}</option>
                                    @endforeach 
                                 </select>&nbsp;
                                    <br/>
                                   
                                 <label> Seleccione el periodo al que pertenece:</label><br/> 
                                  <select style="width: 70%;"  name="period_cycle" id="period_cycle" onchange="ver_carrera();" >
                                <option value="0">Seleccione un Periodo Lectivo</option>
                                   @foreach($period_cycles as $period)
                                <option value="{{$period->id}}">{{ $period->year}} {{$period->cycle}}</option>
                                    @endforeach 
                                 </select>&nbsp;
                                    <br/>
                                          <div id="divselect_carrera"> </div>
                                    <div id="divselect_espacio_fisico">
                                    </div>
                                    <div id="divhorario"></div>
                                <div id="divselect_horario"></div>
                                       
        <br/>
             
                        {!! Form::close() !!}
      

    </div>
                    </div>
                </div>
                    </div>
            </div>


<!-- Modal -->
<div class="modal fade" id="Schedule_modal" tabindex="-1" role="dialog" aria-labelledby="Schedule_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asignar Hora</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            {!! Form::open() !!}
            <div class="alert alert-warning" style="display: none;" id="alert_error"></div>
                <input type="text"  style="display: none;" name="day_id" id="day_id" value="">
                <input type="text"  style="display: none;"  name="hour_id" id="hour_id" value="">
                
                    <div id="divselect_docente">
                            <label> Seleccione un docente:</label><br/> 
                       <select style="width: 70%;"   name="teacher_career_id_" id="teacher_career_id_" >

                        </select>&nbsp;
                         <br/><br/>     
                    </div>
              <input type="text" style="display: none;"   name="physical_space_id" id="physical_space_id" value="">
             
                      {!! Field::text('reason',null,['placeholder'=>'Ingrese el motivo de la asignación', 'id'=>'reason']) !!}

                  {!! Field::text('observation',null,['placeholder'=>'Ingrese una observacion (Opcional)', 'id'=>'observation']) !!}
                <label>Estado:</label> 
                <select name="state" id="state"> 
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
                  </div>
      <div class="modal-footer">
        <button id="escondermodal" onclick="limpiarModal();" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
         {!! Form::button('Guardar',["class"=>"btn btn-success", 'onclick'=> 'crearHorario();']) !!}
      </div>
         {!!Form::close()!!}     
    </div>
  </div>
</div>



<style type="text/css">
    td{
        padding: 8px;
        width: 20px;
        text-align: center;
    }
</style>
<script type="text/javascript">


    function setear_periodo(){
            $('#period_cycle').val('0');
    }
        function asignar( d,h){
          ver_docente_();  
      $('#day_id').val(d);
      $('#hour_id').val(h);
    
    }

    function eliminar(id){
        var id_horario= id;
           $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('delete')}}",
  data: {id:id_horario},
  success: function(data){
    $data = $(data);
    console.log($data);
          ver_horario();
            alertify.notify('Registro eliminado correctamente','error',5, null);         
           
        }
  
});
    }
  function editar(espacio_fisico){
            ver_docente(espacio_fisico.teacher_career_id);
            $('#observation_edit').val(espacio_fisico.observation);
            $('#reason_edit').val(espacio_fisico.reason);
            $('#state_edit').val(espacio_fisico.state);
            $('#schedule_id').val(espacio_fisico.id);
                $("#teacher_career_id_edit option").each(function(){
       var idS=$(this).attr('value');
       var idP=espacio_fisico.teacher_career_id;
       if ($(this).attr('value')==espacio_fisico.teacher_career_id)
       {
        $(this).text('Asignado a '+$(this).text());
        $(this).attr('selected', 'selected');
       }else{
$(this).removeAttr('selected');
       }
    });
        
    }
        function ver_horario(){
            $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('verhorario')}}",
  data: {physical_space_id:$('#physical_space_id').val(),
        period_cycle_id: $('#period_cycle').val()
        },
  success: function(data){
    $data = $(data);
    console.log($data);
            $('#divhorario').html($data);
            $('#divhorario').show();
        }  
});
        }

function limpiarModal(){
    $('#observation').val('');
    $('#state').val('Activo');
    $('#teacher_career_id_').val('0');
    $('#hour_id').val('');
    $('#reason').val('');
    $('#day_id').val();
}

function EditarHorario(){
         $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('EditarHorario')}}",
  data: {id: $('#schedule_id').val(),
    teacher_career_id:$('#teacher_career_id_edit').val(),
    observation:$('#observation_edit').val(),
    reason:  $('#reason_edit').val(),
    state: $('#state_edit').val()},
  success: function(data){
    $data = $(data);
    console.log($data);
            ver_horario();  
             if( data=='El docente tiene asignado este horario en otro espacio físico'){
              $('#alert_create').html(data);
              $('#alert_create').show();
              $('div.alert').delay(3000).fadeOut(350);//tiempo q se muestra la alerta
            }
            else{
             $('#escondermodal_edit').click();   
             alertify.notify('Registro actualizado correctamente','success',5, null);         
            }
        }
  
});
}

function crearHorario(){

   $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('CrearHorario')}}",
  data: {day_id:$('#day_id').val(),
    hour_id:$('#hour_id').val(),
    teacher_career_id:$('#teacher_career_id_').val(),
    period_cycle_id:$('#period_cycle').val(),
    physical_space_id:$('#physical_space_id').val(),
    observation:$('#observation').val(),
    reason:  $('#reason').val(),
    state: $('#state').val()},
  success: function(data){
    $data = $(data);
            ver_horario();
            if( data=='El docente tiene asignado este horario en otro espacio físico'){
              $('#alert_error').html(data);
              $('#alert_error').show();
              $('div.alert').delay(3000).fadeOut(350);//tiempo q se muestra la alerta

            }
            else{
             $('#escondermodal').click();  
               alertify.notify('Registro realizado correctamente','success',5, null);         
            }
        }
  
});

}

function ver_docente_(){
    $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('obtenerDocentes')}}",
  data: {career_id:$('#career_id').val(),
        teacher_career_id: ''},
  success: function(data){
    $data = $(data);
    $data_edit= $(data);
    console.log($data);
              $('#teacher_career_id_ ').html($data);
             
        },
    async: true
  
});
}

function ver_docente(id_docente_actual){
    $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('obtenerDocentes')}}",
  data: {career_id:$('#career_id').val(),
        teacher_career_id: id_docente_actual},
  success: function(data){
    $data = $(data);
    console.log($data);
             $('#teacher_career_id_edit').html($data);
            
           
        },
    async: false
  
});
}

function ver_carrera(){

  if( $('#period_cycle').val()!='0'){
   $('#divhorario').hide();
   $('#divselect_espacio_fisico').hide();
$.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('obtenerEspacios_fisicos_carrera')}}",
  data: {faculties_id:$('#faculties_id').val()},
  success: function(data){
    $data = $(data);
    console.log($data);
            $('#divselect_carrera').html($data);
            $('#divselect_carrera').show();
        },
    async: true
  
});
}else{
  $('#divselect_carrera').hide();
}

}

  function ver_espacio_fisico(){

$.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('obtenerEspacios_fisicos')}}",
  data: {faculties_id:$('#faculties_id').val()},
  success: function(data){
    $data = $(data);
    console.log($data);
            $('#divselect_espacio_fisico').html($data);
            $('#divselect_espacio_fisico').show();
            $('#divhorario').hide();

        },
    async: true
  
});

}
</script>



<!-- Modal Editar Horario -->
<div class="modal fade" id="Schedule_modal_edit" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Hora</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                   <div class="alert alert-warning" style="display: none;" id="alert_create"></div>
            {!! Form::open() !!}
                   <div id="divselect_docente_edit">
                    <input type="text" name="schedule_id" id="schedule_id" style="display: none;">
                     <label> Seleccione un docente:</label><br/> 
                       <select style="width: 70%;"   name="teacher_career_id_edit" id="teacher_career_id_edit" >
                        </select>
                         <br/><br/>   
                     
                    </div>       
                      {!! Field::text('reason',null,['placeholder'=>'Ingrese el motivo de la asignación', 'id'=>'reason_edit']) !!}

                  {!! Field::text('observation',null,['placeholder'=>'Ingrese una observacion (Opcional)', 'id'=>'observation_edit']) !!}
                <label>Estado:</label> 
                <select name="state_edit" id="state_edit"> 
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
                  </div>
      <div class="modal-footer">
        <button id="escondermodal_edit" onclick="limpiarModal();" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
         {!! Form::button('Guardar',["class"=>"btn btn-success", 'onclick'=> 'EditarHorario();']) !!}
      </div>
         {!!Form::close()!!}     
    </div>
  </div>
</div>

@else
<div style="text-align: center; color:red;"><h1>Acceso denegado</h1></div>
@endif

@endsection