@extends('admin.index')

@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Facultad</div>
                    <div class="panel-body">
                        <div class="form-group">
             
                    {!! Form::open(['route'=>'admin.facultades.store']) !!}


                        {!! Field::text('name',null,['placeholder'=>'Ingrese el nombre']) !!}
                        {!! Field::text('address',null,['placeholder'=>'Ingrese la Dirección']) !!}

                        {!! Field::text('phone',null,['placeholder'=>'Ingrese el teléfono']) !!}
                        {!! Field::file('image',['class'=>'file','data-show-preview'=>true,'data-show-upload'=>true]) !!}

                        {!! Form::submit('Guardar',["class"=>"btn btn-success"]) !!}
                        <a href="{{route('admin.facultades.index')}}">
                            <input type="button" class="btn btn-primary" name="Cancelar" value="Cancelar">
                        </a>
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                    </div>
            </div>



@endsection