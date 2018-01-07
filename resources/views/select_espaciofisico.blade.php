  <label> Seleccione el espacio físico para asignar el horario:</label><br/> 
   <select style="width: 70%;" onchange="ver_horario()"  name="physical_space_id_" id="physical_space_id_" >
<option value="">Seleccione un espacio físico</option>
@foreach($physicals_spaces as $object)
<option value="{{$object->id}}"> {{$object->name}}</option> 
@endforeach
    </select>&nbsp;
     <br/><br/>
