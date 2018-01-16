
@extends('admin.index')

@section('content')

 @if(Auth::user()->role_id ==1)
    <div class="container">
 <div class="row">
            <div  style="width: 100%; height: 100%;">
                <div class="panel panel-default">
@include('flash::message')
                    <div class="panel-heading">Docentes</div><br/>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                  <a href="{{ route('admin.docentes.create') }}" class="btn btn-primary">Crear</a>
                    </div>
          
                        </div>  
                            <br/>
                        <table class="table" id="tbl" style="height: 100%;width: 100%;" >
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

           </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function (){
        $('#tbl').DataTable();
    })
</script>
@else
<div style="text-align: center; color:red;"><h1>Acceso denegado</h1></div>
@endif
@endsection