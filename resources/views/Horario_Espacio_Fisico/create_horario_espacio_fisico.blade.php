@extends('admin.index')

@section('content')
<div class="container">

    <div class="row">
             <div style="width: 100%;height: 100%;">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Horario por Espacio Físico</div><br/>
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
                                  <select style="width: 70%;"  name="period_cycle" id="period_cycle" onchange="ver_espacio_fisico();" >
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
                 <div style="text-align: center; ">
                    <a  href="{{route('admin.horario.index')}}">
                            <input type="button" class="btn btn-primary" name="Cancelar" value="Regresar">
                        </a>
                    </div>
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
                <input type="text"  style="display: none;" name="day_id" id="day_id" value="">
                <input type="text"  style="display: none;"  name="hour_id" id="hour_id" value="">
                
                    <div id="divselect_docente">
                            <label> Seleccione un docente:</label><br/> 
                       <select style="width: 70%;"   name="teacher_career_id_" id="teacher_career_id_" >

                        </select>&nbsp;
                         <br/><br/>     
                    </div>
              <input type="text" style="display: none;"   name="physical_space_id" id="physical_space_id" value="">
              <input type="text"  style="display: none;" name="period_cycle_id" id="period_cycle_id">
                    
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
            ver_espacio_fisico();

    }
        function asignar( d,h){

      $('#day_id').val(d);
      $('#hour_id').val(h);
      $('#period_cycle_id').val($('#period_cycle').val());
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
        }
  
});
    }
    function editar(espacio_fisico){
           
            $('#observation_edit').val(espacio_fisico.observation);
            $('#reason_edit').val(espacio_fisico.reason);
            $('#state_edit').val(espacio_fisico.state);
            var ss= $('#teacher_career_id_edit option:selected').val();
            $('#teacher_career_id_edit  option:selected').val(espacio_fisico.teacher_career_id);
            var s=  $('#teacher_career_id_edit option:selected').val();

           

    }



        function ver_horario(){
           
                  $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('verhorario')}}",
  data: {physical_space_id:$('#physical_space_id').val(),
        period_cycle_id: $('#period_cycle_id_').val()
        },
  success: function(data){
    $data = $(data);
    console.log($data);
            $('#divhorario').html($data);
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

function crearHorario(){

   $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('CrearHorario')}}",
  data: {day_id:$('#day_id').val(),
    hour_id:$('#hour_id').val(),
    teacher_career_id:$('#teacher_career_id_').val(),
    period_cycle_id:$('#period_cycle_id').val(),
    physical_space_id:$('#physical_space_id').val(),
    observation:$('#observation').val(),
    reason:  $('#reason').val(),
    state: $('#state').val()},
  success: function(data){
    $data = $(data);
    console.log($data);
            limpiarModal();
            ver_horario();
             $('#escondermodal').click();

        }
  
});

}

function ver_docente(){
    $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('obtenerDocentes')}}",
  data: {career_id:$('#career_id').val()},
  success: function(data){
    $data = $(data);
    $data_edit= $(data);
    console.log($data);
              $('select#teacher_career_id_').html($data_edit);
             $('select#teacher_career_id_edit').html($data);
            
           
        }
  
});
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
        }
  
});


$.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('obtenerEspacios_fisicos_carrera')}}",
  data: {faculties_id:$('#faculties_id').val()},
  success: function(data){
    $data = $(data);
    console.log($data);
            $('#divselect_carrera').html($data);
        }
  
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
            {!! Form::open() !!}
                   <div id="divselect_docente_edit">
                      <label> Seleccione un docente:</label><br/> 
                       <select style="width: 70%;"   name="teacher_career_id_edit" id="teacher_career_id_edit" >

                        </select>&nbsp;
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
         {!! Form::button('Guardar',["class"=>"btn btn-success", 'onclick'=> 'crearHorario();']) !!}
      </div>
         {!!Form::close()!!}     
    </div>
  </div>
</div>




@endsection