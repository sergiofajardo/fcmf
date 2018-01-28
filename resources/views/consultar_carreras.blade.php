   {!!Form::label('Seleccione la Carrera')!!}

{!!Form::select('career_id',$careers,"0",["class"=>"form-control",'id'=>'career_id','name'=>'career_id','onchange'=>'ver_docente_();','style'=>'wigth:100%;'])!!} 

   
