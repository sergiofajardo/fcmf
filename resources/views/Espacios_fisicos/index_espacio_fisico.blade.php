
@extends('admin.index')

@section('content')

    <div class="container">
 <div class="row">
            <div  style="width: 100%; height: 100%;">
                <div class="panel panel-default">
                          
                    <div class="panel-heading">Espacios Físicos</div><br/>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                  <a href="{{ route('admin.espacios_fisicos.create') }}" class="btn btn-primary">Crear</a>
                    </div>
          
                        </div>  

                        <table class="table" style="height: 100%;width: 100%;" >
                            <thead>
                            <th>Espacio Físico</th>
                            <th>Facultad a la que pertenece</th>
                            <th>Tipo de Espacio</th>
                            <th>Facultad a la que pertenece</th>
                            <th>Opciones</th>
                            </thead>
                            <tbody>
                            @foreach( $physicals_spaces as $physical_space)
                                <tr>
                                    <td style="width: 30%">{{ $physical_space->name }}</td>
                                    <td style="width: 10%">{{ $faculties->where('id',$physical_space->faculty_id)->first()->name }}</td>
                                    <td style="width: 30%">{{ $physical_space->type }}</td>
                                    <td style="width: 15%">{{$physical_space->state}}</td>
                                   
                                    <td style="width: 15%">

                                        {{link_to_route('admin.espacios_fisicos.edit','Editar',[$physical_space->id],["class"=>"btn btn-warning btn-xs"])}}
                                        
                                        {{link_to_route('admin.espacios_fisicos.show','Ver',[$physical_space->id],["class"=>"btn btn-warning btn-xs"])}}
                                        <br/><br/>
                                        {!! Form::open(['route'=>['admin.espacios_fisicos.destroy',$physical_space->id],'method'=>'DELETE']) !!}
                                        {!! Form::submit('Borrar',["class"=>"btn btn-danger btn-xs"]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                        {!! $physicals_spaces->render() !!}
           <p>Página {{$physicals_spaces->currentPage()}} de {{$physicals_spaces->lastPage()}}</p>
        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection