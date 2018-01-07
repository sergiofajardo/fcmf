@extends('admin.index')

@section('content')
<div class="container">
    <div class="row">
             <div style="width: 100%;height: 100%;">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Docente</div><br/>
                    <div class="panel-body" style="align-content: center; width:90%; margin-right: 5%; margin-left: 5%; ">
                        <div class="form-group">
             
                    {!! Form::open(['route'=>'admin.docentes.store','files'=>'true','enctype'=>'multipart/form-data']) !!}

                            <label> Seleccione la Facultad para cargar las carreras:</label><br/> 
                              <select style="width: 70%;"  name="faculties_id" id="faculties_id" onchange="ver();" >
                                <option value="0">Seleccione una Facultad</option>
                                   @foreach($faculties as $faculty)
                                <option value="{{$faculty->id}}">{{ $faculty->name}}</option>
                                    @endforeach 
                                 </select>&nbsp;
                                    <br/><br/>

                                     <div id="career_id">
                               
                                 </div>
                         {!! Field::file('image',['class'=>'file','data-show-preview'=>false,'data-show-upload'=>false, 'style'=>'width:100%;']) !!}

                        {!! Field::text('name',null,['placeholder'=>'Ingrese los nombres']) !!}
                        {!! Field::text('last_name',null,['placeholder'=>'Ingrese los apellidos']) !!}
                        {!! Field::text('phone',null,['placeholder'=>'Ingrese el número de telefono']) !!}
                         <label>Ingrese el número de Cedula</label><br/>   <input type="text" name="card" onkeypress="return valida(event)" style="width: 100%;" maxlength="10" class="form-control" placeholder="Ingrese el número de cédula">
                         <label>Ingrese el título que posee</label><br/>   <input type="text" name="degree" style="width: 100%;" class="form-control" placeholder="Ingrese el título del docente">
                            <br/>
                           <label>Seleccione el Estado: </label>  <select  name="state" id="state">
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                                 </select>&nbsp;
                                    <br/><br/>
                       
                        {!! Form::submit('Guardar',["class"=>"btn btn-success"]) !!}
                        <a href="{{route('admin.docentes.index')}}">
                            <input type="button" class="btn btn-primary" name="Cancelar" value="Cancelar">
                        </a>
                        {!! Form::close() !!}
                        </div>
                        <div class="table-responsive">
   

    </div>
                    </div>
                </div>
                    </div>
            </div>

<script type="text/javascript">
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

  function ver(){

$.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('obtenerCarreras')}}",
  data: {faculties_id:$('#faculties_id').val()},
  success: function(data){
    $data = $(data);
    console.log($data);
            $('#career_id').html($data);
        }
  
});

}
</script>

@endsection