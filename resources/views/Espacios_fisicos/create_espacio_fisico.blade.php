@extends('admin.index')

@section('content')

@if(Auth::user()->role_id ==1)
 
 @include('flash::message')
  <div class="alert alert-warning" style="display: none;" id="alert_error"></div>
 <div class="row">
             <div style="width: 100%;height: 100%;">
                <div class="panel panel-default">
        
                    <div class="panel-heading" style="margin-left:4%;">Crear Espacio Físico</div><br/>
                    <div class="panel-body" style="align-content: center; width:90%; margin-right: 5%; margin-left: 5%; ">
                        <div class="form-group">

                    {!! Form::open(['route'=>'admin.espacios_fisicos.store','style'=>'width:80%;margin-left:10%;margin-right:10%;']) !!}
                    {!!Form::label('Seleccione la Facultad a la que pertenece')!!}
                    {!!Form::select('faculties_id',$faculties,null,["class"=>"form-control",'id'=>'faculties_id'])!!} 
                   {!!Form::label('Seleccione el Tipo de Espacio Físico',null)!!}
                   {!!Form::select('type',array_merge(['Aula'=>'Aula','Laboratorio'=>'Laboratorio','Sala de Profesores'=>'Sala de Profesores']),'Aula',["class"=>"form-control"])!!}
                   {!! Field::text('name',null,['label'=>'Ingrese el nombre o Código del Espacio Físico' ,'placeholder'=>'Ingrese el nombre','id'=>'name']) !!}
                   {!! Field::text('location',null,['label'=>'Ingrese la Ubicación del espacio Físico','placeholder'=>'Ingrese la Ubicación del espacio fisico','id'=>'location']) !!}
                   {!!Form::label('Seleccione el Estado',null)!!}
                   {!!Form::select('state',array_merge(['Activo'=>'Activo','Inactivo'=>'Inactivo']),'Activo',["class"=>"form-control"])!!}<br/>
 
                       {!!Form::button('Guardar',['onclick'=>'crear_espacio_fisico();','class'=>'btn btn-success','style'=>'cursor:pointer;'])!!}
                            {!! Form::button('Guardar',["class"=>"btn btn-success",'id'=>'guardar_espacio_fisico','style'=>'display:none;','onclick'=>"form.submit()"]) !!}
                         {{link_to_route('admin.espacios_fisicos.index','Cancelar',[],["class"=>"btn btn-primary"])}}
                     
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                    </div>
            </div>
<script type="text/javascript">
    function crear_espacio_fisico(){

          if ( $('#faculties_id').val() =="0") {
        $('#alert_error').html('Seleccione la Facultad a la que pertenece');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
               window.scrollTo(0,0);
      }else if ($('#name').val()=="") {
              $('#alert_error').html('Ingrese el nombre o código del espacio Físico');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
               window.scrollTo(0,0);
      } 
        else if ($('#location').val()=="") {
              $('#alert_error').html('Ingrese la Ubicación del Espacio Físico');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
               window.scrollTo(0,0);
      } 
        else
    $('#guardar_espacio_fisico').click();
}

</script>
@else
<div style="text-align: center; color:red;"><h1>Acceso denegado</h1></div>
@endif

@endsection