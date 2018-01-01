@extends('admin.index')

@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Carrera</div>
                    <div class="panel-body">
                        <div class="form-group">
             
                    {!! Form::open(['route'=>['admin.espacios_fisicos.update',$physical_space], 'method'=>'PUT']) !!}
       <br/> <span> Tipo de espacio:</span>
             <select  name="type" id="type">
        <option @if($physical_space->type== 'Aula')
            selected 
            @endif value="Aula">Aula</option>
        <option @if($physical_space->type== 'Laboratorio')
            selected 
            @endif value="Laboratorio">Laboratorio</option>
         <option @if($physical_space->type== 'Sala de profesores')
            selected 
            @endif value="Sala de Profesores">Sala de profesores</option>
         </select>&nbsp;
            <br/><br/>
         {!! Field::text('name',$physical_space->name,['placeholder'=>'Ingrese el nombre']) !!}
                       
        <span>Facultad a la que pertenece &nbsp;</span>

         <select  name="faculty_id" id="faculty_id">
             @foreach($faculties as $item)
        <option @if($item->id== $physical_space->faculty_id)
            selected 
            @endif
         value="{{$item->id}}">{{ $item->name}}</option>
            @endforeach 
            </select>&nbsp;
            <br/><br/>
               {!! Field::text('location',$physical_space->location,['placeholder'=>'Ingrese la Ubicación del espacio fisico']) !!}

 <br/> <span> Estado:</span>
             <select  name="state" id="state">
        <option @if($physical_space->state== 'Activo')
            selected 
            @endif value="Activo">Activo</option>
        <option @if($physical_space->state== 'Inactivo')
            selected 
            @endif value="Inactivo">Inactivo</option>
         </select>&nbsp;
            <br/><br/>
                        {!! Form::submit('Guardar',["class"=>"btn btn-success"]) !!}
                        <a href="{{route('admin.espacios_fisicos.index')}}">
                            <input type="button" class="btn btn-primary" name="Cancelar" value="Cancelar">
                        </a>
                          {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                    </div>
            </div>



@endsection