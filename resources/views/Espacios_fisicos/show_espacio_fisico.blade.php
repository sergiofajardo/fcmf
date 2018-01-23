@extends('admin.index')

@section('content')


@if(Auth::user()->role_id ==1)
 <div class="row">
             <div style="width: 100%;height: 100%;">
                <div class="panel panel-default">
         @include('flash::message')
                   <div class="alert alert-warning" style="display: none;" id="alert_error"></div>
                    <div class="panel-heading" style="margin-left:4%;">Datos del Espacio Físico</div><br/>
                    <div class="panel-body" style="align-content: center; width:90%; margin-right: 5%; margin-left: 5%; ">
                        <div class="form-group">
             
                    {!! Form::open(['style'=>'width:80%;margin-left:10%;margin-right:10%;']) !!}
                     {!! Field::text('Facultad a la que pertenece',$faculties->first()->name,['readonly'=>'true']) !!}
            {!! Field::text('Nombre',$physical_space->first()->name,['readonly'=>'true']) !!}
            {!! Field::text('Dirección',$physical_space->first()->location,['readonly'=>'true']) !!}
    {!! Field::text('Tipo de espacio Físico',$physical_space->first()->type,['readonly'=>'true']) !!}
    {!! Field::text('Estado del espacio Físico',$physical_space->first()->state,['readonly'=>'true']) !!}
                      

                        {{ link_to_route('admin.espacios_fisicos.index', 'Regresar',[],['class'=>'btn btn-warning btn-xs'])}}
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