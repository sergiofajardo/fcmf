@extends('admin.index')

@section('content')

@if(Auth::user()->role_id ==1)

<div class="container">
  @include('flash::message')
   <div class="alert alert-warning" style="display: none;" id="alert_error"></div>
    <div class="row">
          <div style="width: 100%;height: 100%;">
                <div class="panel panel-default">
                 <div class="panel-heading">Editar Docente</div>
                    <div class="panel-body" style="align-content: center; width:90%; margin-right: 5%; margin-left: 5%; ">
                        <div class="form-group">
             
      {!! Form::open(['route'=>['admin.docentes.update',$teacher->first()->id], 'method'=>'PUT','enctype'=>'multipart/form-data','style'=>'width:90%;margin-left:5%;margin-right:5%;']) !!}
                    <div style="text-align: center;">
                        <img id="ver_imagen" width="25%" height="150px" src="../../../image/docente/{{$teacher->first()->image}}">
                        </div>
              {!! Field::file('image',['label'=>'Imagen del Docente','id'=>'image','accept'=>'image/*','onchange'=>'ValidarEditarevento(this);']) !!}
              {!! Field::text('name',$teacher->first()->name,['label' =>'Ingrese los nombres','placeholder'=>'Ingrese los nombres','id'=>'name']) !!}
              {!! Field::text('last_name',$teacher->first()->last_name,['label' =>'Ingrese los apellidos','placeholder'=>'Ingrese los apellidos','id'=>'last_name']) !!}
              {!! Field::text('phone',$teacher->first()->phone,['label' =>'Ingrese el número celular','placeholder'=>'Ingrese el número de telefono','id'=>'phone']) !!}

                        {!! Field::text('card',$teacher->first()->card,['label' =>'Ingrese el número de cédula','placeholder'=>'Ingrese el número de cedula','id'=>'card']) !!}
                        {!! Field::text('degree',$teacher->first()->degree,['label' =>'Ingrese el Título','placeholder'=>'Ingrese el título que posee','id'=>'degree']) !!}

                        {!!Form::label('Seleccione la Facultad')!!}
     {!!Form::select('faculties_id',$faculties,$carrera_pertenece,["class"=>"form-control",'id'=>'faculties_id','onchange'=>'ver();','id'=>'faculties_id'])!!} 
                                <div id="career_id">
                                    
                                 </div>
                      {!!Form::label('Seleccione el Estado',null)!!}
                      {!!Form::select('state',array_merge(['Activo'=>'Activo','Inactivo'=>'Inactivo']),$teacher->first()->state,["class"=>"form-control",'id'=>'state'])!!}<br/>
                           
                      {!!Form::button('Guardar',['onclick'=>'actualizar_docente();','class'=>'btn btn-success','style'=>'cursor:pointer;'])!!}
          {!! Form::button('Guardar',["class"=>"btn btn-success",'id'=>'guardar_docente','style'=>'display:none;','onclick'=>"form.submit()"]) !!}
                        {{ link_to_route('admin.docentes.index', 'Cancelar',[],['class'=>'btn btn-warning btn-xs'])}}
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                    </div>
            </div>

<script type="text/javascript">
function actualizar_docente(){
          var los_cboxes = document.getElementsByName('carrera[]'); 
              var suma=0;
for (var i = 0, j = los_cboxes.length; i < j; i++) {
    if(los_cboxes[i].checked == true){
    suma++;
    }     
            }

           if ( $('#faculties_id').val() =="0") {
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
window.onload=ver;
  function ver(){

$.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  method: "POST",
  url: "{{route('obtenerCarrerasSeleccionadas')}}",
  data: {faculties_id:$('#faculties_id').val(), teacher_id: {{$teacher->first()->id}} },
  success: function(data){
    $data = $(data);
    console.log($data);
            $('#career_id').html($data);
        }
  
});

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