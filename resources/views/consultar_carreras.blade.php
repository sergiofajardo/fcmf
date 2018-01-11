  <label> Seleccione la carrera:</label><br/> 
   <select style="width: 70%;"   name="career_id" id="career_id" onchange="ver_docente_();" >
<option value="">Seleccione una carrera</option>
@foreach($careers as $object)
<option value="{{$object->id}}"> {{$object->name}}</option> 
@endforeach
    </select>&nbsp;
     <br/>
