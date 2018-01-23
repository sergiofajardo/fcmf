
@extends('admin.index')

@section('content')

@if(Auth::user()->role_id ==1)
    <div class="container">
        @include('flash::message')
 <div class="row">
            <div  style="width: 100%; height: 100%;">
                <div class="panel panel-default">
                                
                    <div class="panel-heading">Periodos y Ciclos </div><br/>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                  <a href="{{ route('admin.periodo_lectivo.create') }}" class="btn btn-primary">Crear</a>
                    </div>
              
                        </div>  
                        <br/>
                        <table class="table" id="tbl_periodo_lectivo" style="height: 80%;width: 100%;" >
                            <thead>
                            <th>Periodo </th>
                            <th>Ciclo</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                            </thead>
                            <tbody>
                            @foreach( $period_cycles as $period_cycle)
                                <tr>
                                    <td style="width: 35%">{{ $period_cycle->year }}</td>
                                    <td style="width: 10%">{{ $period_cycle->cycle }}</td>
                                    <td style="width: 35%">{{ $period_cycle->state }}</td>
                                    <td style="width: 40%">

                                        
                                        {!! Form::open(['route'=>['admin.periodo_lectivo.destroy',$period_cycle->id],'method'=>'DELETE']) !!}
                                        {{link_to_route('admin.periodo_lectivo.edit','Editar',[$period_cycle->id],["class"=>"btn btn-warning btn-xs"])}}
                                      
                                       {!! Form::button('Eliminar',['style'=>'cursor:pointer;',"class"=>"btn btn-danger btn-xs",'onclick'=>'eliminar_periodo(this)','cursor:pointer;']) !!}   
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
        function eliminar_periodo(e){
   var confirm= alertify.confirm('Eliminar Periodo','Seguro desea eliminar el periodo lectivo, este cambio es irreversible?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   
confirm.set({transition:'slide'});      
confirm.set('onok', function(){ //callbak al pulsar botón positivo
         e.form.submit();
});

}
    $(document).ready(function (){
        $('#tbl_periodo_lectivo').DataTable();
    })
</script>

@else
<div style="text-align: center; color:red;"><h1>Acceso denegado</h1></div>
@endif
@endsection