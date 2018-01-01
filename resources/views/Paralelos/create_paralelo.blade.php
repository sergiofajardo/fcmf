@extends('admin.index')

@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Paralelo</div>
                    <div class="panel-body">
                        <div class="form-group">
             
                    {!! Form::open(['route'=>'admin.paralelos.store']) !!}

                        {!! Field::text('code',null,['placeholder'=>'Ingrese el codigo del paralelo']) !!}
                       
                          <label>Estado:</label> {{ Form::select('state', [
                               'Activo' => 'Activo',
                               'Inactivo' => 'Inactivo']
                            ) }}
                            <br/>
                        {!! Form::submit('Guardar',["class"=>"btn btn-success"]) !!}
                        <a href="{{route('admin.paralelos.index')}}">
                            <input type="button" class="btn btn-primary" name="Cancelar" value="Cancelar">
                        </a>
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                    </div>
            </div>



@endsection