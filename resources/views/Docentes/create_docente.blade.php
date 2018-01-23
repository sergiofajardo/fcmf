@extends('admin.index')

@section('content')

@if(Auth::user()->role_id ==1)

<div class="container">
  @include('flash::message')
  <div class="alert alert-warning" style="display: none;" id="alert_error"></div>
    <div class="row">
             <div style="width: 100%;height: 100%;">
                <div class="panel panel-default">
         <div class="panel-heading">Crear Docente</div><br/>
                    <div class="panel-body" style="align-content: center; width:90%; margin-right: 5%; margin-left: 5%; ">
                        <div class="form-group">
            
                    {!! Form::open(['route'=>'admin.docentes.store','files'=>'true','enctype'=>'multipart/form-data','style'=>'width:90%;margin-left:5%;margin-right:5%;']) !!}
              <div style="text-align: center;">
             <img id="ver_imagen" src="../../image/not_image.png" style="width: 25%;height: 150px;"> </div>
            {!! Field::file('image',['label'=>'Imagen del Docente','id'=>'image','accept'=>'image/gif|jpg|jpeg|png','onchange'=>'ValidarEditarevento(this);']) !!}
            {!! Field::text('name',null,['label' =>'Nombres','placeholder'=>'Ingrese los nombres','id'=>'name']) !!}
            {!! Field::text('last_name',null,['label' =>'Apellidos','placeholder'=>'Ingrese los apellidos','id'=>'last_name']) !!}
            {!! Field::text('phone',null,['label' =>'Teléfono','placeholder'=>'Ingrese el número de telefono','id'=>'phone','onkeypress'=>'return valida(event)','maxlength'=>'10']) !!}
            {!! Field::text('card',null,['label' =>'Ingrese el número de Cédula','placeholder'=>'Ingrese el número de cédula','onkeypress'=>'return valida(event)','maxlength'=>'10','id'=>'card']) !!}

            {!! Field::text('degree',null,['label' =>'Ingrese el Título','placeholder'=>'Ingrese el Título del docente','id'=>'degree']) !!}  
              {!!Form::label('Seleccione la Facultad para cargar las Carreras')!!}
             {!!Form::select('faculties_id',$faculties,null,["class"=>"form-control",'id'=>'faculties_id','onchange'=>'ver();'])!!} 
              <div id="career_id"> </div>           
          {!!Form::label('Seleccione el Estado',null)!!}
          {!!Form::select('state',array_merge(['Activo'=>'Activo','Inactivo'=>'Inactivo']),'Activo',["class"=>"form-control"])!!}<br/>
          {!!Form::button('Guardar',['onclick'=>'crear_docente();','class'=>'btn btn-success','style'=>'cursor:pointer;'])!!}
          {!! Form::button('Guardar',["class"=>"btn btn-success",'id'=>'guardar_docente','style'=>'display:none;','onclick'=>"form.submit()"]) !!}
          {{link_to_route('admin.docentes.index','Cancelar',[],["class"=>"btn btn-primary"])}}
          {!! Form::close() !!}
                        </div>
                        <div class="table-responsive"></div>
                    </div>
                </div>
                    </div>
            </div>

<script type="text/javascript">
  window.onload=ver;
function crear_docente(){
          var los_cboxes = document.getElementsByName('carrera[]'); 
              var suma=0;
for (var i = 0, j = los_cboxes.length; i < j; i++) {
    if(los_cboxes[i].checked == true){
    suma++;
    }     
            }

            if ($('#image').val()=="") {
              $('#alert_error').html('Cargue la Imagen del docente');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
               window.scrollTo(0,0);
      }else if ( $('#faculties_id').val() =="0") {
        $('#alert_error').html('Seleccione una Facultad');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
               window.scrollTo(0,0);
      } else if(suma == 0){
          $('#alert_error').html('Seleccione al menos una carrera');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
               window.scrollTo(0,0);
                }
     else if ( $('#name').val() =="") {
        $('#alert_error').html('Ingrese los nombres del docente');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
               window.scrollTo(0,0);
      }else if ($('#last_name').val()=="") {
              $('#alert_error').html('Ingrese los apellidos del docente');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
               window.scrollTo(0,0);
      } 
      else if ($('#phone').val()=="") {
              $('#alert_error').html('Ingrese el número de celular del docente');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
               window.scrollTo(0,0);
      } else if( $('#card').val() ==""){
        $('#alert_error').html('Ingrese el número de cédula');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
               window.scrollTo(0,0);
             }
        else if ($('#degree').val()=="") {
              $('#alert_error').html('Ingrese el título del docente');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
               window.scrollTo(0,0);
      } 
        else
    $('#guardar_docente').click();
}
function ValidarEditarevento(obj){
var uploadFile = obj.files[0];
 if (!window.FileReader) {
        alert('El navegador no soporta la lectura de archivos');
        return;
    }
 if (!(/\.(jpeg|jpg|png|gif|JPG|PNG|GIF|JPEG)$/i).test(uploadFile.name)) {
              $('#alert_error').html('El archivo a adjuntar no es una imagen: Formatos validos jpeg-jpg-png-gif');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
        $('#image').val("");
        window.scrollTo(0,0);
    }else {
        var img = new Image();
        img.onload = function () {
          /*  if (this.width.toFixed(0) != 800 && this.height.toFixed(0) != 900) {
                alert('Las medidas deben ser: 800 * 900');
                $('#image').val("");}
            else*/ if (uploadFile.size > 8000000)
            {
              $('#alert_error').html('El peso de la imagen no puede exceder los 8mb');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
                $('#image').val("");
               window.scrollTo(0,0);
            }  
        };
        img.src = URL.createObjectURL(uploadFile);
         var file = obj.files[0],
      imageType = /image.*/;
       var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
    }                  
}
 function fileOnload(e) {
      var result=e.target.result;
      $('#ver_imagen').attr("src",result);
     }

function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

  function ver(){

$.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('obtenerCarreras')}}",
  data: {faculties_id:$('#faculties_id').val()},
  success: function(data){
    $data = $(data);
    console.log($data);
            $('#career_id').html($data);
        }
  
});
}
</script>
@else
<div style="text-align: center; color:red;"><h1>Acceso denegado</h1></div>
@endif

@endsection