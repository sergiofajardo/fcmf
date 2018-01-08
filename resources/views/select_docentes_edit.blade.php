  <label> Seleccione un docente:</label><br/> 
   <select style="width: 70%;"   name="teacher_career_id_edit" id="teacher_career_id_edit" >
<option value="0">Seleccione un docente</option>
@foreach($teachers as $object)
 @foreach($teachers_careers as $carrera)
  			@if($carrera->teacher_id == $object->id) 
<option  
 value=" {{$carrera->id}}"> {{$object->name}} {{$object->last_name}}</option> 
 @endif  @endforeach
@endforeach
    </select>&nbsp;
     <br/><br/>
