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
                              <select style="width: 70%;"  name="faculties_id" id="faculties_id" onchange="ver_espacio_fisico();" >
                                <option value="0">Seleccione una Facultad</option>
                                   @foreach($faculties as $faculty)
                                <option value="{{$faculty->id}}">{{ $faculty->name}}</option>
                                    @endforeach 
                                 </select>&nbsp;
                                    <br/>

                                    <div id="divselect_espacio_fisico">
                                    </div>
                                     <label> Seleccione el periodo al que pertenece:</label><br/> 
                              <select style="width: 70%;"  name="period_cycle" id="period_cycle" >
                                <option value="0">Seleccione un Periodo Lectivo</option>
                                   @foreach($period_cycles as $period)
                                <option value="{{$period->id}}">{{ $period->year}} {{$period->cycle}}</option>
                                    @endforeach 
                                 </select>&nbsp;
                                    <br/>
     <table id="horario_" style="display:none;"  class="table table-bordered" style="width: 100%; height: 100%;" >
            <thead>
            <tr>
                <th> Horas\Días</th>
                @foreach($days as $day)
                <th >{{$day->name}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
                @foreach($hours as $hour)
                    <tr>
                        <td class="hora bg-inverse">{{ $hour->since }}-{{ $hour->until }}</td>
                            @foreach($days as $day)
                        <td class="bg-success" >
                                 <button id="btn-asignar" onclick="ver({{$day->id}},{{$hour->id}});" type="button" class="btn btn-primary" data-toggle="modal" data-day="{{$day->id}}" data-hour="{{$hour->id}}" data-target="#Schedule_modal">
                                        Asignar
                            </button>
                             </td>

                            @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
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
            {!! Form::open(['route'=>'admin.horario.store','method'=>'POST']) !!}
                <input type="text"  style="display: none;" name="day_id" id="day_id" value="">
                <input type="text"  style="display: none;"  name="hour_id" id="hour_id" value="">
                     <div id="divselect_carrera">
                                    </div>
                    <div id="divselect_docente">
                        
                    </div>
              <input type="text" style="display: none;"   name="physical_space_id" id="physical_space_id" value="">
              <input type="text"  style="display: none;" name="period_cycle_id" id="period_cycle_id">
  
                  {!! Field::text('observation',null,['placeholder'=>'Ingrese una observacion (Opcional)']) !!}
                <label>Estado:</label> 
                <select name="state"> 
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
                  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
         {!! Form::submit('Guardar',["class"=>"btn btn-success"]) !!}
      </div>
         {!!Form::close()!!}     
    </div>
  </div>
</div>




<script type="text/javascript">
        function ver( d,h){
      $('#day_id').val(d);
      $('#hour_id').val(h);
      $('#physical_space_id').val($('#physical_space_id_').val());
      $('#period_cycle_id').val($('#period_cycle').val());
    }

        function ver_horario(){
            $('#horario_').show();
        }


function ver_docente(){
    $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('obtenerDocentes')}}",
  data: {career_id:$('#career_id').val()},
  success: function(data){
    $data = $(data);
    console.log($data);
            $('#divselect_docente').html($data);
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

@endsection