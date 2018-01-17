@extends('admin.index')

@section('content')
<div style="width: 100%;">

    <div class="row">
             <div style="width: 100%;height: 100%;">
                <div class="panel panel-default">
                    <div class="panel-heading" style="margin-left: 5%"><h3>
                        <b>Consultar Horario por Espacio Físico</b></h3></div><br/>
                    <div class="panel-body" style="align-content: center; width:90%; margin-right: 5%; margin-left: 5%; ">
                        <div class="form-group">
             
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
                                   <div id="divselect_espacio"></div>
                                  <input style="display: none;" type="button" id="btn_consultar" value="Consultar" onclick="Consultar_horario();" class="btn btn-success"><br/><br/>
                                <div id="generar_pdf" style="display: none;"> 
                      {!! Form::open(['route'=>'pdf_horario_espacio_fisico','method'=>'POST']) !!}
                         <input type="text" style="display: none; " name="physical_space_id_pdf" id="physical_space_id_pdf">
                         <input type="text" style="display: none;" name="period_cycle_id_pdf" id="period_cycle_id_pdf">
                        <input type="submit" class="btn btn-info" name="GENERAR PDF" value="GENERAR PDF"> <br/> <br/>
                       
                       {!! Form::close() !!}
                      </div>

                                   <div id="divhorario"></div>
                               
                                       
        <br/>
             
                       
      

    </div>
                    </div>
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
             $('#generar_pdf').hide();
            $('#divhorario').hide();
             $('#btn_consultar').hide();
             $('#divselect_espacio').hide();          
            }

       function ver_horario(){
          $('#btn_consultar').show();
           $('#divhorario').hide();
            $('#generar_pdf').hide();
       }     
        function Consultar_horario(){      
                  $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "GET",
  url: "{{route('Consultar_horario_por_espacio_fisico')}}",
  data: {physical_space_id:$('#physical_space_id').val(),
        period_cycle_id: $('#period_cycle').val()
        },
  success: function(data){
    $data = $(data);
    console.log($data);
            $('#divhorario').html($data);
            $('#divhorario').show();
              $('#physical_space_id_pdf').val($('#physical_space_id').val());
            $('#period_cycle_id_pdf').val($('#period_cycle').val());
           if($data["0"].innerText == "No tiene asignado un horario")//se valida si existe un horario o no
            $('#generar_pdf').hide();
          else
             $('#generar_pdf').show();
        }
  
});
        }

             function ver_espacio_fisico(){      
                  $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('getphysicals_spacesbyfaculty_consult')}}",
  data: {faculties_id:$('#faculties_id').val(),
        },
  success: function(data){
    $data = $(data);
    console.log($data);
            $('#divselect_espacio').html($data);
            $('#divhorario').hide();
            $('#generar_pdf').hide();
            $('#btn_consultar').hide();
             $('#divselect_espacio').show();

        }
  
});
}

function ocl(){
  $('#generar_pdf').hide();
}
</script>
@endsection