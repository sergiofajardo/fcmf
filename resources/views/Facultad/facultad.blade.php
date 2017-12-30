
@extends('admin.index')

@section('content')

    <div class="container">


        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Facultad</div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-8">
                                
                            </div>
                        </div>

                        <table class="table">
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
                                    <td> {{link_to_route('adminfacultades.edit','Editar',[$facultie->id],["class"=>"btn btn-warning btn-xs"])}}
                                        {{link_to_route('adminfacultades.show','Ver',[$facultie->id],["class"=>"btn btn-warning btn-xs"])}}
                                        {!! Form::open(['route'=>['adminfacultades.destroy',$facultie->id],'method'=>'DELETE']) !!}
                                        {!! Form::submit('Borrar',["class"=>"btn btn-danger btn-xs"]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                        {!! $faculties->render() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection