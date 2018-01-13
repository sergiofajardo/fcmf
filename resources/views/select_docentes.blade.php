 
<option value="0">Seleccione un docente</option>
@foreach($teachers as $object)
<option value=" {{$object->ID}}"> {{$object->NAME}} {{$object->LAST_NAME}}</option> 
   @endforeach
   
