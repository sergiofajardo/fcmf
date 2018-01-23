
@extends('admin.index')

@section('content')

@if(Auth::user()->role_id ==1)
    <div class="container">
      @include('flash::message')
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
                            <br/>
                        <table class="table" id="tbl_espacio_fisico" style="height: 100%;width: 100%;" >
                            <thead>
                            <th>Espacio Físico</th>
                            <th>Facultad a la que pertenece</th>
                            <th>Tipo de Espacio</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                            </thead>
                            <tbody>
                            @foreach( $physicals_spaces as $physical_space)
                                <tr>
                                    <td style="width: 15%">{{ $physical_space->name }}</td>
                                    <td style="width: 40%">{{ $faculties->where('id',$physical_space->faculty_id)->first()->name }}</td>
                                    <td style="width: 13%">{{ $physical_space->type }}</td>
                                    <td style="width: 10%">{{$physical_space->state}}</td>
                                   
                                    <td style="width: 22%">
                 {!! Form::open(['route'=>['admin.espacios_fisicos.destroy',$physical_space->id],'method'=>'DELETE']) !!}
                 {{link_to_route('admin.espacios_fisicos.edit','Editar',[$physical_space->id],["class"=>"btn btn-warning btn-xs"])}}
                                        
                  {{link_to_route('admin.espacios_fisicos.show','Ver',[$physical_space->id],["class"=>"btn btn-info btn-xs"])}}
                     {!! Form::button('Eliminar',['style'=>'cursor:pointer;',"class"=>"btn btn-danger btn-xs",'onclick'=>'eliminar_espacio_fisico(this)','cursor:pointer;']) !!}                      
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
      function eliminar_espacio_fisico(e){
   var confirm= alertify.confirm('Eliminar Espacio Físico','Seguro desea eliminar el espacio físico, este cambio es irreversible?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   
 
confirm.set({transition:'slide'});      
 
confirm.set('onok', function(){ //callbak al pulsar botón positivo
         e.form.submit();
});

}
    $(document).ready(function (){
        $('#tbl_espacio_fisico').DataTable();
    })
</script>

@else
<div style="text-align: center; color:red;"><h1>Acceso denegado</h1></div>
@endif

@endsection