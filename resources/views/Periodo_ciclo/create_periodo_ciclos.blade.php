@extends('admin.index')

@section('content')

@if(Auth::user()->role_id ==1)

 <div class="alert alert-warning" style="display: none;" id="alert_error"></div>
            @include('flash::message')
 <div class="row">
             <div style="width: 100%;height: 100%;">
                <div class="panel panel-default">
       
                  
                    <div class="panel-heading" style="margin-left:4%;">Crear Periodo Lectivo</div><br/>
                    <div class="panel-body" style="align-content: center; width:90%; margin-right: 5%; margin-left: 5%; ">
                        <div class="form-group">
             
                    {!! Form::open(['route'=>'admin.periodo_lectivo.store','style'=>'width:80%;margin-left:10%;margin-right:10%;']) !!}
                     {!! Field::text('year',null,['placeholder'=>'Ingrese el año (2017-2018)','label'=>'Ingrese el año lectivo','maxlength'=>'9','id'=>'year']) !!}
                    {!!Form::label('Seleccione el ciclo lectivo')!!}
                    {!!Form::select('cycle',[ 'CI' => 'CI','CII'=>'CII'],'CI',["class"=>"form-control",'id'=>'faculties_id'])!!} 
                    {!!Form::label('Seleccione el estado')!!}
                    {!!Form::select('state',['Activo'=>'Activo','Inactivo'=>'Inactivo'],'Activo',["class"=>"form-control",'id'=>'faculties_id'])!!} <br/>

                    {!!Form::button('Guardar',['onclick'=>'crear_periodo_lectivo();','class'=>'btn btn-success','style'=>'cursor:pointer;'])!!}
                            {!! Form::button('Guardar',["class"=>"btn btn-success",'id'=>'guardar_periodo_lectivo','style'=>'display:none;','onclick'=>"form.submit()"]) !!}
                       
                        {{link_to_route('admin.periodo_lectivo.index','Cancelar',[],["class"=>"btn btn-primary"])}}
                      
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                    </div>
            </div>
<script type="text/javascript">
   function crear_periodo_lectivo(){

          if ( $('#year').val() =="" || $('#year').val().length <9) {
        $('#alert_error').html('Ingrese el año lectivo. Ejemplo(2017-2018)');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
               window.scrollTo(0,0);
      } else
    $('#guardar_periodo_lectivo').click();
}
</script>
@else
<div style="text-align: center; color:red;"><h1>Acceso denegado</h1></div>
@endif

@endsection