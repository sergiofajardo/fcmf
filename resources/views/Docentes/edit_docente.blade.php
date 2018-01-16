@extends('admin.index')

@section('content')

@if(Auth::user()->role_id ==1)

<div class="container">
  @include('flash::message')
    <div class="row">
          <div style="width: 100%;height: 100%;">
                <div class="panel panel-default">
                 
                    <div class="panel-heading">Editar Docente</div>
                    <div class="panel-body" style="align-content: center; width:90%; margin-right: 5%; margin-left: 5%; ">
                        <div class="form-group">
             
                    {!! Form::open(['route'=>['admin.docentes.update',$teacher], 'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                        <img style="margin-left: 20%; margin-right: 20%;" width="60%" height="230px" src="../../../image/docente/{{$teacher->image}}">
                        
             <br/><br/>
                   <label>Seleccione la Facultad en la que sera asignado para cargar las carreras:</label> <br/>
                              <select style="width: 70%;"  name="faculties_id" id="faculties_id" onchange="ver();" >
                                   @foreach($faculties as $faculty)
                                <option @if($carrera_pertenece->first()->faculty_id == $faculty->id) 
                                   selected  @endif  value="{{$faculty->id}}">{{ $faculty->name}}</option>
                                    @endforeach 
                                 </select>&nbsp;
                                    <br/><br/>
                                <div id="career_id">
                                    
                                 </div>
                     {!! Field::file('image',['class'=>'file','data-show-preview'=>false,'data-show-upload'=>false]) !!}
                        {!! Field::text('name',$teacher->name,['placeholder'=>'Ingrese los nombres']) !!}
                        {!! Field::text('last_name',$teacher->last_name,['placeholder'=>'Ingrese los apellidos']) !!}
                        {!! Field::text('phone',$teacher->phone,['placeholder'=>'Ingrese el número de telefono']) !!}

                        {!! Field::text('card',$teacher->card,['placeholder'=>'Ingrese el número de cedula']) !!}
                        {!! Field::text('degree',$teacher->degree,['placeholder'=>'Ingrese el título que posee']) !!}

                             <select  name="state" id="state">
                                <option @if($teacher->state =='Activo') selected @endif value="Activo">Activo</option>
                                <option @if($teacher->state =='Inactivo') selected @endif value="Inactivo">Inactivo</option>
                                 </select>&nbsp;
                                    <br/><br/>
                        {!! Form::submit('Guardar',["class"=>"btn btn-success"]) !!}
                        {{ link_to_route('admin.docentes.index', 'Regresar',[],['class'=>'btn btn-warning btn-xs'])}}
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                    </div>
            </div>

<script type="text/javascript">

window.onload=ver;
  function ver(){

$.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('obtenerCarrerasSeleccionadas')}}",
  data: {faculties_id:$('#faculties_id').val(), teacher_id: {{$teacher->id}} },
  success: function(data){
    $data = $(data);
    console.log($data);
            $('#career_id').html($data);
        }
  
});

}
</script>

@else
<div style="text-align: center; color:red;"><h1>Acceso denegado</h1></div>
@endif

@endsection