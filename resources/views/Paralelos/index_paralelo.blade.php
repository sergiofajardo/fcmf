
@extends('admin.index')

@section('content')

    <div class="container">
 <div class="row">
            <div  style="width: 100%; height: 100%;">
                <div class="panel panel-default">
                          
                    <div class="panel-heading">Paralelos </div><br/>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                  <a href="{{ route('admin.paralelos.create') }}" class="btn btn-primary">Crear</a>
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
                            <th>Codigo del paralelo</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                            </thead>
                            <tbody>
                            @foreach( $classrooms as $classroom)
                                <tr>
                                    <td style="width: 10%">{{ $classroom->code }}</td>
                                    <td style="width: 35%">{{ $classroom->state }}</td>
                                    <td style="width: 20%">

                                        {{link_to_route('admin.paralelos.edit','Editar',[$classroom->id],["class"=>"btn btn-warning btn-xs"])}}
                                        
                                        <br/><br/>
                                        {!! Form::open(['route'=>['admin.paralelos.destroy',$classroom->id],'method'=>'DELETE']) !!}
                                        {!! Form::submit('Borrar',["class"=>"btn btn-danger btn-xs"]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                        {!! $classrooms->render() !!}
           <p>Página {{$classrooms->currentPage()}} de {{$classrooms->lastPage()}}</p>
        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection