@extends('admin.index')

@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Espacio Físico</div>
                    <div class="panel-body">
                        <div class="form-group">
             
                    {!! Form::open(['route'=>'admin.espacios_fisicos.store']) !!}
   <br/> <span> Tipo de espacio:</span>
             <select  name="type" id="type">
        <option value="Aula">Aula</option>
        <option value="Laboratorio">Laboratorio</option>
         <option value="Sala de Profesores">Sala de profesores</option>
         </select>&nbsp;
            <br/><br/>
         {!! Field::text('name',null,['placeholder'=>'Ingrese el nombre']) !!}
                       
        <span>Facultad a la que pertenece &nbsp;</span>

        <select  name="faculty_id" id="faculty_id">
             @foreach($faculties as $item)
        <option value="{{$item->id}}">{{ $item->name}}</option>
            @endforeach 
            </select>&nbsp;
            <br/><br/>
               {!! Field::text('location',null,['placeholder'=>'Ingrese la Ubicación del espacio fisico']) !!}

 <br/> <span> Estado:</span>
             <select  name="state" id="state">
        <option value="Activo">Activo</option>
        <option value="Inactivo">Inactivo</option>
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