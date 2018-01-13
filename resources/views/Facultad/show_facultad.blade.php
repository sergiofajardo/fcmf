@extends('admin.index')

@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Facultad</div>
                    <div class="panel-body">
                        <div class="form-group">
                    
                    {!! Form::open() !!}
                    <img style="margin-left: 10%; margin-right: 10%;" width="400px" height="250px" src="../../image/facultad/{{$faculties->image}}">
             
                        {!! Field::text('name',$faculties->name,['readonly'=>'true']) !!}
                        {!! Field::text('address',$faculties->address,['readonly'=>'true']) !!}

                        {!! Field::text('phone',$faculties->phone,['readonly'=>'true']) !!}
                         {!! Field::textarea('mision',$faculties->mission,['readonly'=>'true', 'rows'=>'4', 'style'=>'resize:none']) !!}

                        {!! Field::textarea('vision',$faculties->vision,['readonly'=>'true', 'rows'=>'5', 'style'=>'resize:none']) !!}

                        {{ link_to_route('admin.facultades.index', 'Regresar',[],['class'=>'btn btn-warning btn-xs'])}}
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                    </div>
            </div>



@endsection