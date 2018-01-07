  <label> Seleccione la carrera:</label><br/> 
   <select style="width: 70%;"   name="teacher_career_id" id="teacher_career_id" >
<option value="">Seleccione un docente</option>
@foreach($teachers as $object)
 @foreach($teachers_careers as $carrera)
  			@if($carrera->teacher_id == $object->id) 
<option  
 value=" {{$carrera->id}}"> {{$object->name}} {{$object->last_name}}</option> 
 @endif  @endforeach
@endforeach
    </select>&nbsp;
     <br/><br/>
