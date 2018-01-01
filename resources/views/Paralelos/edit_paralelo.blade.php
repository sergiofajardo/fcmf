@extends('admin.index')

@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Periodo Lectivo</div>
                    <div class="panel-body">
                        <div class="form-group">
             
                      {!! Form::open(['route'=>['admin.paralelos.update',$classroom->id], 'method'=>'PUT']) !!}
                      
                        {!! Field::text('code',$classroom->code,['placeholder'=>'Ingrese el codigo del paralelo']) !!}
                       
                          <label>Estado:</label> 
                          <select name="state" id="state">
                              <option @if($classroom->state == 'Activo')
                                selected @endif value="Activo">Activo</option>
                              <option @if($classroom->state == 'Inactivo')
                                selected @endif value="Inactivo"> Inactivo</option>
                          </select>
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