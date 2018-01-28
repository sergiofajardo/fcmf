{!!Form::label('Seleccione la carrera para cargar los docentes')!!}
   {!!Form::select('faculty_id',$careers,"0",["class"=>"form-control",'id'=>'career_id','name'=>'career_id','onchange'=>'ver_espacio_fisico();','style'=>'wigth:100%;'])!!} 
  
