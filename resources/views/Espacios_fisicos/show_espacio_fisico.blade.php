@extends('admin.index')

@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Datos de la Carrera</div>
                    <div class="panel-body">
                        <div class="form-group">
             
                    {!! Form::open() !!}
                        {!! Field::text('Nombre',$careers->name,['readonly'=>'true']) !!}
                        {!! Field::text('Dirección',$careers->address,['readonly'=>'true']) !!}
                         {!! Field::text('Facultad a la que pertenece',$faculty,['readonly'=>'true']) !!}
                        {!! Field::text('Teléfono',$careers->phone,['readonly'=>'true']) !!}
                         {!! Field::textarea('Misión',$careers->mission,['readonly'=>'true', 'rows'=>'4', 'style'=>'resize:none']) !!}

                        {!! Field::textarea('Visión',$careers->vision,['readonly'=>'true', 'rows'=>'5', 'style'=>'resize:none']) !!}

                        {{ link_to_route('admin.carreras.index', 'Regresar',[],['class'=>'btn btn-warning btn-xs'])}}
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                    </div>
            </div>



@endsection