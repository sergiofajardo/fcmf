
@extends('admin.index')

@section('content')

    <div class="container">
 <div class="row">
            <div  style="width: 100%; height: 100%;">
                <div class="panel panel-default">
                          
                    <div class="panel-heading">Docentes</div><br/>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                  <a href="{{ route('admin.docentes.create') }}" class="btn btn-primary">Crear</a>
                    </div>
          
                        </div>  

                        <table class="table" style="height: 100%;width: 100%;" >
                            <thead>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Título que posee</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                            </thead>
                            <tbody>
                            @foreach( $teachers as $teacher)
                                <tr>
                                    <td style="width: 20%">{{ $teacher->name }}</td>
                                    <td style="width: 20%">{{ $teacher->last_name }}</td>
                                    <td style="width: 20%">{{ $teacher->degree }}</td>
                                    <td style="width: 10%">{{$teacher->state}}</td>
                                   
                                    <td style="width: 30%">
                                        {!! Form::open(['route'=>['admin.docentes.destroy',$teacher->id],'method'=>'DELETE']) !!}
                                          {{link_to_route('admin.docentes.edit','Editar',[$teacher->id],["class"=>"btn btn-warning btn-xs"])}}
                                       
                                        {{link_to_route('admin.docentes.show','Ver',[$teacher->id],["class"=>"btn btn-info btn-xs"])}}
                                      
                                        {!! Form::submit('Borrar',["class"=>"btn btn-danger btn-xs"]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                        {!! $teachers->render() !!}
           <p>Página {{$teachers->currentPage()}} de {{$teachers->lastPage()}}</p>
        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection