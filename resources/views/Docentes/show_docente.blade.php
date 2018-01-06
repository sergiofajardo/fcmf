@extends('admin.index')

@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Docente</div>
                    <div class="panel-body">
                        <div class="form-group">
                    
                    {!! Form::open() !!}
                    <img style="margin-left: 10%; margin-right: 10%;" width="400px" height="250px" src="../../image/docente/{{$teacher->image}}">
             
                        {!! Field::text('name',$teacher->name,['readonly'=>'true']) !!}
                        {!! Field::text('last_name',$teacher->last_name,['readonly'=>'true']) !!}
                        {!! Field::text('card',$teacher->card,['readonly'=>'true']) !!}
                        {!! Field::text('phone',$teacher->phone,['readonly'=>'true']) !!}
                        {!! Field::text('degree',$teacher->degree,['readonly'=>'true']) !!}
                        {!! Field::text('state',$teacher->state,['readonly'=>'true']) !!}
                         
                        

                        {{ link_to_route('admin.docentes.index', 'Regresar',[],['class'=>'btn btn-warning btn-xs'])}}
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                    </div>
            </div>



@endsection