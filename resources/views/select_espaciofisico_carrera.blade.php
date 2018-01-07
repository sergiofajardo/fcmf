  <label> Seleccione la carrera:</label><br/> 
   <select style="width: 70%;" onchange="ver_docente();"  name="career_id" id="career_id" >
<option value="">Seleccione una carrera</option>
@foreach($careers as $object)
<option value="{{$object->id}}"> {{$object->name}}</option> 
@endforeach
    </select>&nbsp;
     <br/><br/>
