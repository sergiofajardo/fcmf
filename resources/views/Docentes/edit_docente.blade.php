@extends('admin.index')

@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Docente</div>
                    <div class="panel-body">
                        <div class="form-group">
             
                    {!! Form::open(['route'=>['admin.docentes.update',$teacher], 'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                        <img style="margin-left: 10%; margin-right: 10%;" width="70%" height="230px" src="../../../image/docente/{{$teacher->image}}">
             
                     {!! Field::file('image',['class'=>'file','data-show-preview'=>false,'data-show-upload'=>false]) !!}
                        {!! Field::text('name',$teacher->name,['placeholder'=>'Ingrese los nombres']) !!}
                        {!! Field::text('last_name',$teacher->last_name,['placeholder'=>'Ingrese los apellidos']) !!}
                        {!! Field::text('phone',$teacher->phone,['placeholder'=>'Ingrese el número de telefono']) !!}

                        {!! Field::text('card',$teacher->card,['placeholder'=>'Ingrese el número de cedula']) !!}
                        {!! Field::text('degree',$teacher->degree,['placeholder'=>'Ingrese el título que posee']) !!}

                             <select  name="state" id="state">
                                <option @if($teacher->state =='Activo') selected @endif value="Activo">Activo</option>
                                <option @if($teacher->state =='Inactivo') selected @endif value="Inactivo">Inactivo</option>
                                 </select>&nbsp;
                                    <br/><br/>
                        {!! Form::submit('Guardar',["class"=>"btn btn-success"]) !!}
                        {{ link_to_route('admin.docentes.index', 'Regresar',[],['class'=>'btn btn-warning btn-xs'])}}
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                    </div>
            </div>



@endsection