@extends('admin.index')

@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Facultad</div>
                    <div class="panel-body">
                        <div class="form-group">
             
                    {!! Form::open(['route'=>['admin.facultades.update',$faculties], 'method'=>'PUT']) !!}
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



@endsection