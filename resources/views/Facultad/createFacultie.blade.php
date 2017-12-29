@extends('admin.index')

@section('content')


            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Facultad</div>
                    <div class="panel-body">
                        {!! Form::open(['route'=>'adminFaculties.store']) !!}

                        {!! Field::text('name',null,['placeholder'=>'Ingrese nombre']) !!}
                        {!! Field::text('phone',null,['placeholder'=>'Ingrese telefono']) !!}
                        {!! Field::file('image',['class'=>'file','data-show-preview'=>false,'data-show-upload'=>false]) !!}

                        {!! Form::submit('Guardar',["class"=>"btn btn-success"]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>



@endsection
