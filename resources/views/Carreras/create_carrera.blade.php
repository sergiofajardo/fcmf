@extends('admin.index')

@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Carrera</div>
                    <div class="panel-body">
                        <div class="form-group">
             
                    {!! Form::open(['route'=>'admin.carreras.store','files'=>'true','enctype'=>'multipart/form-data']) !!}

        <span>Facultad a la que pertenece &nbsp;</span>

        <select  name="faculty_id" id="faculty_id">
             @foreach($faculties as $item)
        <option value="{{$item->id}}">{{ $item->name}}</option>
            @endforeach 
            </select>&nbsp;
            <br/><br/>

                         {!! Field::file('image',['class'=>'file','data-show-preview'=>false,'data-show-upload'=>false]) !!}
                        {!! Field::text('name',null,['placeholder'=>'Ingrese el nombre']) !!}
                        {!! Field::text('address',null,['placeholder'=>'Ingrese la Dirección']) !!}

                        {!! Field::text('phone',null,['placeholder'=>'Ingrese el teléfono']) !!}
                       
                          {!! Field::textarea('mission',null,['rows'=>'4', 'style'=>'resize:none']) !!}

                        {!! Field::textarea('vision',null,['rows'=>'5', 'style'=>'resize:none']) !!}


                        {!! Form::submit('Guardar',["class"=>"btn btn-success"]) !!}
                        <a href="{{route('admin.carreras.index')}}">
                            <input type="button" class="btn btn-primary" name="Cancelar" value="Cancelar">
                        </a>
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                    </div>
            </div>



@endsection