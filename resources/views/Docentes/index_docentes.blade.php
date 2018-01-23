
@extends('admin.index')

@section('content')

 @if(Auth::user()->role_id ==1)
    <div class="container">
        @include('flash::message')
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
                                    <td style="width: 28%">{{ $teacher->degree }}</td>
                                    <td style="width: 10%">{{$teacher->state}}</td>
                                   
                                    <td style="width: 22%">
                                        {!! Form::open(['route'=>['admin.docentes.destroy',$teacher->id],'method'=>'DELETE']) !!}
                                          {{link_to_route('admin.docentes.edit','Editar',[$teacher->id],["class"=>"btn btn-warning btn-xs"])}}
                                       
                                        {{link_to_route('admin.docentes.show','Ver',[$teacher->id],["class"=>"btn btn-info btn-xs"])}}
                                {!! Form::button('Eliminar',['style'=>'cursor:pointer;',"class"=>"btn btn-danger btn-xs",'onclick'=>'eliminar_docente(this)','cursor:pointer;']) !!}
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

   function eliminar_docente(e){
   var confirm= alertify.confirm('Eliminar Docente','Seguro desea eliminar el docente, este cambio es irreversible?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   
 
confirm.set({transition:'slide'});      
 
confirm.set('onok', function(){ //callbak al pulsar botón positivo
         e.form.submit();
});

}
    $(document).ready(function (){
        $('#tbl').DataTable();
    })
</script>
@else
<div style="text-align: center; color:red;"><h1>Acceso denegado</h1></div>
@endif
@endsection