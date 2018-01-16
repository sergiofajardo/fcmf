@extends('admin.index')

@section('content')


@if(Auth::user()->role_id ==1)
<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Facultad</div>
                    <div class="panel-body">
                        <div class="form-group">
             
                    {!! Form::open(['route'=>['admin.facultades.update',$faculties], 'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                        <img style="margin-left: 10%; margin-right: 10%;" width="400px" height="250px" src="../../../image/facultad/{{$faculties->image}}">
             
                     {!! Field::file('image',['class'=>'file','data-show-preview'=>false,'data-show-upload'=>false]) !!}
                       
                        {!! Field::text('name',$faculties->name) !!}
                        {!! Field::text('address',$faculties->address) !!}

                        {!! Field::text('phone',$faculties->phone) !!}
                        {!! Field::text('mission',$faculties->mission) !!}
                        {!! Field::text('vision',$faculties->vision) !!}

                        {!! Form::submit('Guardar',["class"=>"btn btn-success"]) !!}
                        {{ link_to_route('admin.facultades.index', 'Regresar',[],['class'=>'btn btn-warning btn-xs'])}}
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