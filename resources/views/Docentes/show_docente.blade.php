@extends('admin.index')

@section('content')
@if(Auth::user()->role_id ==1)
<div class="container">
    <div class="row">
            <div style="width: 100%;height: 100%;">
                <div class="panel panel-default">
                    <div class="panel-heading"> Docente</div>
                    <div class="panel-body" style="align-content: center; width:90%; margin-right: 5%; margin-left: 5%; ">
                        <div class="form-group">
                    
                    {!! Form::open(['style'=>'width:90%;margin-left:5%;margin-right:5%;']) !!}
                    <div style="text-align: center;">
                    <img style="margin-left: 20%; margin-right: 20%;" width="25%" height="150px" src="../../image/docente/{{$teacher->image}}"></div>
                    <br/>
                  <label>Facultad en la que trabaja:  </label><br/>
                   <label> @if($faculties !=null) <b> {{$faculties->first()->name}}</b> @else  <b>No tiene asignada ninguna Facultad </b>  @endif  </label><br/>
                 <label>Carreras en las que da clases:</label><br/>
                 @if($teacher_careers != null )
                    @foreach($teacher_careers as $object)
                    <label> <b>{{$object->name}} </b></label> <br/>
                        @endforeach

                        @else <b>  No tiene asignada ninguna carrera</b>
                            @endif
         {!! Field::text('name',$teacher->name,['readonly'=>'true','label'=>'Nombres']) !!}
         {!! Field::text('last_name',$teacher->last_name,['readonly'=>'true','label'=>'Apellidos']) !!}
         {!! Field::text('card',$teacher->card,['readonly'=>'true','label'=>'Cédula']) !!}
         {!! Field::text('phone',$teacher->phone,['readonly'=>'true','label'=>'Teléfono']) !!}
         {!! Field::text('degree',$teacher->degree,['readonly'=>'true','label'=>'Título']) !!}
         {!! Field::text('state',$teacher->state,['readonly'=>'true','label'=>'Estado']) !!}
         {{ link_to_route('admin.docentes.index', 'Regresar',[],['class'=>'btn btn-warning btn-xs'])}}
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