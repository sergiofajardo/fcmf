@extends('admin.index')

@section('content')
<div style="width: 100%;">

    <div class="row">
             <div style="width: 100%;height: 100%;">
                <div class="panel panel-default">
                    <div class="panel-heading" style="margin-left: 5%"><h3>
                        <b>Consultar Horario por Docente</b></h3></div><br/>
                    <div class="panel-body" style="align-content: center; width:90%; margin-right: 5%; margin-left: 5%; ">
                        <div class="form-group">
             
                    {!! Form::open() !!}
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
                                   
                                         <div id="divselect_carrera">

                                           </div>
                                           
                                             <div id="docente" style="display: none;">
                                   <label>Seleccione un Docente:</label><br/>
                                    <select id="divselect_docente" name="teacher_career_id" style="width: 70%;"></select><br/><br/>
                                    <input type="button" value="Consultar" onclick="Consultar_horario();" class="btn btn-success">
                                </div>
                                <div id="ocultar_horario" style="display: none;">
                                    <br/>
                                    <div class="dt-button">
                                  <button class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="divhorario"><span>GENERAR PDF</span></button>
                                  </div>
                                    <div id="divhorario"></div> </div>
                                <div id="divselect_horario"></div>
                                       
        <br/>
             
                        {!! Form::close() !!}
      

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
     <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" type="text/css">

</style>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">    
  </script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript">

$(document).ready(function() {
    $('#divhorario').DataTable( {
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                customize: function ( doc ) {
                    doc.content.splice( 1, 0, {
                        margin: [ 0, 0, 0, 12 ],
                        alignment: 'center'
                        } );
                }
            }
        ]
    } );
} );

    function Consultar_horario(){

      

               $.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('Consultar_horario_por_docente')}}",
  data: {teacher_career_id:$('#divselect_docente').val(),
        period_cycle_id: $('#period_cycle').val(),
        faculties_id: $('#faculties_id').val()
        
        },
  success: function(data){
    $data = $(data);
    console.log($data);
            $('#divhorario').html($data);
            $('#ocultar_horario').show();
        }
  
});


    }


  


 function setear_periodo(){
            $('#period_cycle').val('0');
            $('#docente').hide();

            $('#form_horario').hide();
             ver_espacio_fisico();


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
              $('#divselect_docente').html($data);
              $('#docente').show();
             
        },
    async: false
  
});
}


  function ver_espacio_fisico(){

$.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('Consultar_Carreras')}}",
  data: {faculties_id:$('#faculties_id').val()},
  success: function(data){
    $data = $(data);
    console.log($data);
            $('#divselect_carrera').html($data);
            $('#docente').hide();
            $('#form_horario').hide();

        },
    async: false
  
});
}
</script>






@endsection