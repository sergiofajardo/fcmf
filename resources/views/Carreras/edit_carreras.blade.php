@extends('admin.index')

@section('content')

@if(Auth::user()->role_id ==1)

@include('flash::message')   
<div class="alert alert-warning" style="display: none;" id="alert_error"></div>
<div class="row">
             <div style="width: 100%;height: 100%;">
                <div class="panel panel-default">
                       
                    <div class="panel-heading" style="margin-left:4%;">Editar Carrera</div><br/>
                    <div class="panel-body" style="align-content: center; width:90%; margin-right: 5%; margin-left: 5%; ">
                        <div class="form-group">
             
                    {!! Form::open(['route'=>['admin.carreras.update',$careers], 'method'=>'PUT','enctype'=>'multipart/form-data','style'=>'width:80%;margin-left:10%;margin-right:10%;']) !!}
                    {!!Form::label('Facultad a la que pertenece')!!}
                        {!!Form::select('faculty_id',$faculties,$careers->faculty_id,["class"=>"form-control",'id'=>'faculties_id'])!!} 
            <br/><br/>
            <div style="text-align: center;">
            <img id="ver_imagen" src="../../../image/carrera/{{$careers->image}}" style="width: 25%;height: 150px;"> </div>
                        {!! Field::file('image',['label'=>'Imagen de la Carrera','id'=>'image','accept'=>'image/gif|jpg|jpeg|png','onchange'=>'ValidarEditarevento(this);']) !!}
          
                       {!! Field::text('name',$careers->name) !!}
                        {!! Field::text('address',$careers->address) !!}
                        {!! Field::text('phone',$careers->phone) !!}
                        {!! Field::textarea('mission',$careers->mission,['rows'=>'4', 'style'=>'resize:none']) !!}
                        {!! Field::textarea('vision',$careers->vision,['rows'=>'5', 'style'=>'resize:none']) !!}
                        {!! Form::submit('Guardar',["class"=>"btn btn-success"]) !!}
                        {{ link_to_route('admin.carreras.index', 'Regresar',[],['class'=>'btn btn-warning btn-xs'])}}
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                    </div>
            </div>
<script type="text/javascript">
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