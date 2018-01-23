@extends('admin.index')

@section('content')


@if(Auth::user()->role_id ==1)

@include('flash::message')
         <div class="alert alert-warning" style="display: none;" id="alert_error"></div>
 <div class="row">
             <div style="width: 100%;height: 100%;">
                <div class="panel panel-default">
         
                    <div class="panel-heading" style="margin-left:4%;">Editar Espacio Físico</div><br/>
                    <div class="panel-body" style="align-content: center; width:90%; margin-right: 5%; margin-left: 5%; ">
                        <div class="form-group">
             
                    {!! Form::open(['route'=>['admin.espacios_fisicos.update',$physical_space], 'method'=>'PUT','style'=>'width:80%;margin-left:10%;margin-right:10%;']) !!}

        {!!Form::label('Seleccione la Facultad a la que pertenece')!!}
        {!!Form::select('faculties_id',$faculties,$physical_space->faculty_id,["class"=>"form-control",'id'=>'faculties_id'])!!} 
                   {!!Form::label('Seleccione el Tipo de Espacio Físico',null)!!}
                   {!!Form::select('type',array_merge(['Aula'=>'Aula','Laboratorio'=>'Laboratorio','Sala de Profesores'=>'Sala de Profesores']),$physical_space->type,["class"=>"form-control"])!!}
      
                {!! Field::text('name',$physical_space->name,['label'=>'Ingrese el nombre o Código del espacio físico','placeholder'=>'Ingrese el nombre']) !!}
                {!! Field::text('location',$physical_space->location,['placeholder'=>'Ingrese la Ubicación del espacio fisico','label'=>'Ubicación del espacio físico']) !!}
                {!!Form::label('Seleccione el Estado',null)!!}
                   {!!Form::select('state',array_merge(['Activo'=>'Activo','Inactivo'=>'Inactivo']),$physical_space->state,["class"=>"form-control"])!!}<br/>
                        {!! Form::submit('Guardar',["class"=>"btn btn-success"]) !!}
                        {{link_to_route('admin.espacios_fisicos.index','Cancelar',[],["class"=>"btn btn-primary"])}}
                       {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                    </div>
            </div>

@else
<div style="text-align: center; color:red;"><h1>Acceso denegado</h1></div>
@endif


@endsection