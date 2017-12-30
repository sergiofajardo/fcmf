
@extends('admin.index')

@section('content')

    <div class="container">
 <div class="row">
            <div  style="width: 100%; height: 100%;">
                <div class="panel panel-default">
                          
                    <div class="panel-heading">Facultades</div><br/>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                  <a href="{{ route('admin.facultades.create') }}" class="btn btn-primary">Crear</a>
                    </div>
                    <div class="col-md-4">
                         {!! Form::open(['route'=>'admin.facultades.index','method'=>'GET']) !!}
                        {!! Form::text('scope',$scope,['class'=>'form-control']) !!}
                        
                        {!! Form::submit('Buscar',["class"=>"btn btn-success"]) !!}
                                                                {!! Form::close() !!}

                      
                    </div>
                   
                        </div>  

                        <table class="table" >
                            <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>direccion</th>
                            <th>Opciones</th>
                            </thead>
                            <tbody>
                            @foreach( $faculties as $facultie)
                                <tr>
                                    <td>{{ $facultie->id }}</td>
                                    <td>{{ $facultie->name }}</td>
                                    <td>{{ $facultie->phone }}</td>
                                    <td>{{ $facultie->address }}</td>
                                    <td>{{link_to_route('admin.facultades.edit','Editar',[$facultie->id],["class"=>"btn btn-warning btn-xs"])}}
                                        
                                        {{link_to_route('admin.facultades.show','Ver',[$facultie->id],["class"=>"btn btn-warning btn-xs"])}}
                                        {!! Form::open(['route'=>['admin.facultades.destroy',$facultie->id],'method'=>'DELETE']) !!}
                                        {!! Form::submit('Borrar',["class"=>"btn btn-danger btn-xs"]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                        {!! $faculties->render() !!}
           <p>Página {{$faculties->currentPage()}} de {{$faculties->lastPage()}}</p>
        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection