@extends('admin.index')

@section('content')

@if(Auth::user()->role_id ==1)

 <div class="row">
             <div style="width: 100%;height: 100%;">
                <div class="panel panel-default">

                   <div class="alert alert-warning" style="display: none;" id="alert_error"></div>
                    <div class="panel-heading" style="margin-left:4%;">Datos de la Facultad</div><br/>
                    <div class="panel-body" style="align-content: center; width:90%; margin-right: 5%; margin-left: 5%; ">
                        <div class="form-group">
                    {!! Form::open(['style'=>'width:80%; margin-left:10%;margin-right:10%;']) !!}
                    <div style="text-align: center;">
                    <img style="margin-left: 10%; margin-right: 10%;" width="25%" height="150px" src="../../image/facultad/{{$faculties->image}}"></div>
                        {!! Field::text('name',$faculties->name,['readonly'=>'true','label'=>'Nombre de la Facultad']) !!}
                        {!! Field::text('address',$faculties->address,['readonly'=>'true','label'=>'Dirección de la Facultad']) !!}

                        {!! Field::text('phone',$faculties->phone,['readonly'=>'true','label'=>'Teléfono de la Facultad']) !!}
                         {!! Field::textarea('mision',$faculties->mission,['readonly'=>'true', 'rows'=>'4', 'style'=>'resize:none','label'=>'Misión de la Carrera']) !!}

                        {!! Field::textarea('vision',$faculties->vision,['readonly'=>'true', 'rows'=>'5', 'style'=>'resize:none','label'=>'Visión de la carrera']) !!}

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