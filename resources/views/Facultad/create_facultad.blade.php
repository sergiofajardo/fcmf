@extends('admin.index')

@section('content')


@if(Auth::user()->role_id ==1)
 
  @include('flash::message')
    <div class="alert alert-warning" style="display: none;" id="alert_error"></div>
 <div class="row">
             <div style="width: 100%;height: 100%;">
                <div class="panel panel-default">

                    <div class="panel-heading" style="margin-left:4%;">Crear Facultad</div><br/>
                    <div class="panel-body" style="align-content: center; width:90%; margin-right: 5%; margin-left: 5%; ">
                        <div class="form-group">
             
                    {!! Form::open(['route'=>'admin.facultades.store','files'=>'true','enctype'=>'multipart/form-data','style'=>'width:80%;margin-left:10%;margin-right:10%;']) !!}
                        <div style="text-align: center;">
                        <img id="ver_imagen" src="../../image/not_image_carrera.jpg" style="width: 25%;height: 150px;"> </div>
                        {!! Field::file('image',['label'=>'Imagen de la Facultad','id'=>'image','accept'=>'image/gif|jpg|jpeg|png','onchange'=>'ValidarEditarevento(this);']) !!}
                        {!! Field::text('name',null,['label'=>'Ingrese el nombre de la Facultad','placeholder'=>'Ingrese el nombre','id'=>'name']) !!}
                        {!! Field::text('address',null,['label'=>'Ingrese la dirección de la Facultad' ,'placeholder'=>'Ingrese la Dirección','id'=>'address']) !!}
                        {!! Field::text('phone',null,['label'=>'Ingrese el teléfono de la Facultad','placeholder'=>'Ingrese el teléfono','id'=>'phone']) !!}
                          {!! Field::textarea('mission',null,['label'=>'Ingrese la misión de la Facultad','rows'=>'4', 'style'=>'resize:none','id'=>'mission']) !!}
                        {!! Field::textarea('vision',null,['label'=>'Ingrese la visión de la Facultad','rows'=>'5', 'style'=>'resize:none','id'=>'vision']) !!}
                           {!!Form::button('Guardar',['onclick'=>'crear_facultad();','class'=>'btn btn-success','style'=>'cursor:pointer;'])!!}
                            {!! Form::button('Guardar',["class"=>"btn btn-success",'id'=>'guardar_facultad','style'=>'display:none;','onclick'=>"form.submit()"]) !!}
                            {{link_to_route('admin.facultades.index','Cancelar',[],["class"=>"btn btn-primary"])}}
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                    </div>
            </div>
            <script type="text/javascript">
function crear_facultad(){

            if ($('#image').val()=="") {
              $('#alert_error').html('Cargue la Imagen de la Facultad');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
               window.scrollTo(0,0);
      } else if ( $('#name').val() =="") {
        $('#alert_error').html('Ingrese el nombre de la Facultad');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
               window.scrollTo(0,0);
      }else if ($('#address').val()=="") {
              $('#alert_error').html('Ingrese la dirección de la Facultad');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
               window.scrollTo(0,0);
      } 
        else if ($('#phone').val()=="") {
              $('#alert_error').html('Ingrese el número de teléfono de la Facultad');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
               window.scrollTo(0,0);
      } 
      else if ($('#mission').val()=="") {
              $('#alert_error').html('Ingrese la misión de la Facultad');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
               window.scrollTo(0,0);
      } else if( $('#vision').val() ==""){
        $('#alert_error').html('Ingrese la visión de la Facultad');
              $('#alert_error').show();
               $('div.alert').delay(5500).fadeOut(350);
               window.scrollTo(0,0);
             }
        else
    $('#guardar_facultad').click();
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
            </script>
@else
<div style="text-align: center; color:red;"><h1>Acceso denegado</h1></div>
@endif


@endsection