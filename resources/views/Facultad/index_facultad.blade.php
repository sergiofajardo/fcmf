
@extends('admin.index')

@section('content')


@if(Auth::user()->role_id ==1)
    <div class="container">
       @include('flash::message')
 <div class="row">
            <div  style="width: 100%; height: 100%;">
                <div class="panel panel-default">
                         
                    <div class="panel-heading">Facultades</div><br/>

                    <div class="panel-body" style="width: 100%; height: 100%;">
                        <div class="row">
                            <div class="col-md-8">
                                  <a href="{{ route('admin.facultades.create') }}" class="btn btn-primary">Crear</a>
                    </div>
                 </div>  
                        <br/>
                     <table class="table" id="tbl_facultades" style="height: 100%;width: 100%;" >
                            <thead>
                            <th>Facultad</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Opciones</th>
                            </thead>
                            <tbody>
                            @foreach( $faculties as $facultie)
                                <tr>
                                    <td style="width: 35%">{{ $facultie->name }}</td>
                                    <td style="width: 10%">{{ $facultie->phone }}</td>
                                    <td style="width: 30%">{{ $facultie->address }}</td>
                                    <td style="width: 25%">

                                      
                                        {!! Form::open(['route'=>['admin.facultades.destroy',$facultie->id],'method'=>'DELETE']) !!}
                                          {{link_to_route('admin.facultades.edit','Editar',[$facultie->id],["class"=>"btn btn-warning btn-xs"])}}
                                        
                                        {{link_to_route('admin.facultades.show','Ver',[$facultie->id],["class"=>"btn btn-info btn-xs"])}}
                                      
                               {!! Form::button('Eliminar',['style'=>'cursor:pointer;',"class"=>"btn btn-danger btn-xs",'onclick'=>'eliminar_facultad(this)','cursor:pointer;']) !!} 
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
      function eliminar_facultad(e){
   var confirm= alertify.confirm('Eliminar Facultad','Seguro desea eliminar la Facultad, este cambio es irreversible?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   
confirm.set({transition:'slide'});      
confirm.set('onok', function(){ //callbak al pulsar botón positivo
         e.form.submit();
});

}
    $(document).ready(function (){
        $('#tbl_facultades').DataTable();
    })
</script>

@else
<div style="text-align: center; color:red;"><h1>Acceso denegado</h1></div>
@endif
@endsection