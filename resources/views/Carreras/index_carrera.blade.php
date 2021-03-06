
@extends('admin.index')

@section('content')

@if(Auth::user()->role_id ==1)

    <div class="container">
          @include('flash::message')
 <div class="row">
            <div  style="width: 100%; height: 100%;">
                <div class="panel panel-default">
                 
                    <div class="panel-heading">Carreras</div><br/>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                  <a href="{{ route('admin.carreras.create') }}" class="btn btn-primary">Crear</a>
                    </div>
                
                        </div> <br/> 

                        <table class="table" id="tbl_carreras" style="height:100%;width: 100%;" >
                            <thead style="width: 100%;">
                            <th style="width: 25%">Carrera</th>
                            <th style="width: 10%">Teléfono</th>
                            <th style="width: 20%">Dirección</th>
                            <th style="width: 20%">Facultad a la que pertenece</th>
                            <th style="width: 25%">Opciones</th>
                            </thead>
                            <tbody style="width: 100%;">
                            @foreach( $careers as $career)
                                <tr>
                                    <td style="width: 25%">{{ $career->name }}</td>
                                    <td style="width: 10%">{{ $career->phone }}</td>
                                    <td style="width: 20%">{{ $career->address }}</td>
                                    <td style="width: 20%">{{$faculties->where('id',$career->faculty_id)->first()->name}}</td>
                                   
                                    <td style="width: 25%">
                                     {!! Form::open(['route'=>['admin.carreras.destroy',$career->id],'method'=>'DELETE']) !!}
                                     {{link_to_route('admin.carreras.edit','Editar',[$career->id],["class"=>"btn btn-warning btn-xs"])}}
                                      {{link_to_route('admin.carreras.show','Ver',[$career->id],["class"=>"btn btn-info btn-xs"])}}
                                {!! Form::button('Eliminar',['style'=>'cursor:pointer;',"class"=>"btn btn-danger btn-xs",'onclick'=>'eliminar_carrera(this)','cursor:pointer;']) !!}

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
     function eliminar_carrera(e){
   var confirm= alertify.confirm('Eliminar Carrera','Seguro desea eliminar la Carrera, este cambio es irreversible?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   
confirm.set({transition:'slide'});      
confirm.set('onok', function(){ //callbak al pulsar botón positivo
         e.form.submit();
});

}
    $(document).ready(function (){
        $('#tbl_carreras').DataTable();
    })
</script>

@else
<div style="text-align: center; color:red;"><h1>Acceso denegado</h1></div>
@endif

@endsection