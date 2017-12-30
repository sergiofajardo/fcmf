
@extends('admin.index')

@section('content')

    <div class="container">
 <div class="row">
            <div  style="width: 100%; height: 100%;">
                <div class="panel panel-default">
                          
                    <div class="panel-heading">Carreras</div><br/>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                  <a href="{{ route('admin.carreras.create') }}" class="btn btn-primary">Crear</a>
                    </div>
                 <!--   <div class="col-md-4">
                         {!! Form::open(['route'=>'admin.facultades.index','method'=>'GET']) !!}
                        {!! Form::text('scope',$scope,['class'=>'form-control']) !!}
                        
                        {!! Form::submit('Buscar',["class"=>"btn btn-success"]) !!}
                                                                {!! Form::close() !!}

                      
                    </div>
                -->
                   
                        </div>  

                        <table class="table" style="height: 100%;width: 100%;" >
                            <thead>
                            <th>Carrera</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Facultad a la que pertenece</th>
                            <th>Opciones</th>
                            </thead>
                            <tbody>
                            @foreach( $careers as $career)
                                <tr>
                                    <td style="width: 30%">{{ $career->name }}</td>
                                    <td style="width: 10%">{{ $career->phone }}</td>
                                    <td style="width: 30%">{{ $career->address }}</td>
                                    <td style="width: 15%">{{$faculties->where('id',$career->faculty_id)->first()->name}}</td>
                                   
                                    <td style="width: 15%">

                                        {{link_to_route('admin.carreras.edit','Editar',[$career->id],["class"=>"btn btn-warning btn-xs"])}}
                                        
                                        {{link_to_route('admin.carreras.show','Ver',[$career->id],["class"=>"btn btn-warning btn-xs"])}}
                                        <br/><br/>
                                        {!! Form::open(['route'=>['admin.carreras.destroy',$career->id],'method'=>'DELETE']) !!}
                                        {!! Form::submit('Borrar',["class"=>"btn btn-danger btn-xs"]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                        {!! $careers->render() !!}
           <p>Página {{$careers->currentPage()}} de {{$careers->lastPage()}}</p>
        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection