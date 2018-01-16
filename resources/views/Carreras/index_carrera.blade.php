
@extends('admin.index')

@section('content')

@if(Auth::user()->role_id ==1)

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

                        <table class="table" id="tbl_carreras" style="height: 100%;width: 100%;" >
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
                                    <td style="width: 25%">{{ $career->name }}</td>
                                    <td style="width: 10%">{{ $career->phone }}</td>
                                    <td style="width: 20%">{{ $career->address }}</td>
                                    <td style="width: 25%">{{$faculties->where('id',$career->faculty_id)->first()->name}}</td>
                                   
                                    <td style="width: 20%">
                                     {!! Form::open(['route'=>['admin.carreras.destroy',$career->id],'method'=>'DELETE']) !!}
                                     {{link_to_route('admin.carreras.edit','Editar',[$career->id],["class"=>"btn btn-warning btn-xs"])}}
                                        
                                        {{link_to_route('admin.carreras.show','Ver',[$career->id],["class"=>"btn btn-info btn-xs"])}}
                                        
                                        {!! Form::submit('Borrar',["class"=>"btn btn-danger btn-xs"]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function (){
        $('#tbl_carreras').DataTable();
    })
</script>

@else
<div style="text-align: center; color:red;"><h1>Acceso denegado</h1></div>
@endif

@endsection