@extends('admin.index')

@section('content')

@if(Auth::user()->role_id ==1)
<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Periodo Lectivo</div>
                    <div class="panel-body">
                        <div class="form-group">
             
                      {!! Form::open(['route'=>['admin.periodo_lectivo.update',$period_cycle->id], 'method'=>'PUT']) !!}
                        {!! Field::text('year',$period_cycle->year,['placeholder'=>'Ingrese el año']) !!}
                        <label>Ciclo:</label>
                          <select  name="cycle" id="cycle">
        <option @if($period_cycle->cycle== 'CI')
            selected 
            @endif
         value="CI">1</option>
           
            <option @if($period_cycle->cycle== 'CII')
            selected 
            @endif
         value="CII">2</option>
        
            </select>&nbsp;
            <br/><br/>
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

@else
<div style="text-align: center; color:red;"><h1>Acceso denegado</h1></div>
@endif

@endsection