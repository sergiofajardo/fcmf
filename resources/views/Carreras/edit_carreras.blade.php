@extends('admin.index')

@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Carrera</div>
                    <div class="panel-body">
                        <div class="form-group">
             
                    {!! Form::open(['route'=>['admin.carreras.update',$careers], 'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                      <span>Facultad a la que pertenece &nbsp;</span>

        <select  name="faculty_id" id="faculty_id">
             @foreach($faculties as $item)
        <option @if($item->id== $careers->faculty_id)
            selected 
            @endif
         value="{{$item->id}}">{{ $item->name}}</option>
            @endforeach 
            </select>&nbsp;
            <br/><br/>
               <img style="margin-left: 10%; margin-right: 10%;" width="400px" height="250px" src="../../../image/carrera/{{$careers->image}}">
                    {!! Field::file('image',['class'=>'file','data-show-preview'=>false,'data-show-upload'=>false]) !!}
                       {!! Field::text('name',$careers->name) !!}
                        {!! Field::text('address',$careers->address) !!}
                        {!! Field::text('phone',$careers->phone) !!}
                        {!! Field::textarea('mission',$careers->mission,['rows'=>'4', 'style'=>'resize:none']) !!}
                        {!! Field::textarea('vision',$careers->vision,['rows'=>'5', 'style'=>'resize:none']) !!}
                        {!! Form::submit('Guardar',["class"=>"btn btn-success"]) !!}
                        {{ link_to_route('admin.carreras.index', 'Regresar',[],['class'=>'btn btn-warning btn-xs'])}}
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                    </div>
            </div>



@endsection