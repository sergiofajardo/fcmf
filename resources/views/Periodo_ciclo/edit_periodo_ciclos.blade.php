@extends('admin.index')

@section('content')

@if(Auth::user()->role_id ==1)
   @include('flash::message')
 <div class="row">

             <div style="width: 100%;height: 100%;">
                <div class="panel panel-default">
        

                    <div class="panel-heading" style="margin-left:4%;">Editar Periodo Lectivo</div><br/>
                    <div class="panel-body" style="align-content: center; width:90%; margin-right: 5%; margin-left: 5%; ">
                        <div class="form-group">
             
                      {!! Form::open(['route'=>['admin.periodo_lectivo.update',$period_cycle->id], 'method'=>'PUT','style'=>'width:80%;margin-left:10%;margin-right:10%;']) !!}
                       {!! Field::text('year',$period_cycle->year,['placeholder'=>'Ingrese el año (2017-2018)','label'=>'Ingrese el año lectivo','maxlength'=>'9','id'=>'year']) !!}
                    {!!Form::label('Seleccione el ciclo lectivo')!!}
                    {!!Form::select('cycle',[ 'CI' => 'CI','CII'=>'CII'],$period_cycle->cycle,["class"=>"form-control",'id'=>'faculties_id'])!!} 
                    {!!Form::label('Seleccione el estado')!!}
                    {!!Form::select('state',['Activo'=>'Activo','Inactivo'=>'Inactivo'],$period_cycle->state,["class"=>"form-control",'id'=>'faculties_id'])!!} <br/>

                       {!! Form::button('Guardar',["class"=>"btn btn-success",'onclick'=>'form.submit()','style'=>'cursor:pointer;'])!!}
                        
                         {{link_to_route('admin.periodo_lectivo.index','Cancelar',[],["class"=>"btn btn-primary"])}}
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