@extends('admin.index')

@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Periodo Lectivo</div>
                    <div class="panel-body">
                        <div class="form-group">
             
                    {!! Form::open(['route'=>'admin.periodo_lectivo.store']) !!}

                        {!! Field::text('year',null,['placeholder'=>'Ingrese el año']) !!}
                          <label>Ciclo:</label> {{ Form::select('cycle', [
                               '1' => '1',
                               '2' => '2']
                            ) }}
                            <br/>
                          <label>Estado:</label> {{ Form::select('state', [
                               'Activo' => 'Activo',
                               'Inactivo' => 'Inactivo']
                            ) }}
                            <br/>
                        {!! Form::submit('Guardar',["class"=>"btn btn-success"]) !!}
                        <a href="{{route('admin.periodo_lectivo.index')}}">
                            <input type="button" class="btn btn-primary" name="Cancelar" value="Cancelar">
                        </a>
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                    </div>
            </div>



@endsection