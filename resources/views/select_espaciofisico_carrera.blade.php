  <label> Seleccione la carrera:</label><br/> 
<<<<<<< HEAD
   <select style="width: 70%;"  onchange="ver_espacio_fisico();"  name="career_id" id="career_id" >
=======
   <select style="width: 70%;"   name="career_id" id="career_id" >
>>>>>>> c424f0b55bce8643c77177beeb3885d0ee7d9c34
<option value="">Seleccione una carrera</option>
@foreach($careers as $object)
<option value="{{$object->id}}"> {{$object->name}}</option> 
@endforeach
    </select>&nbsp;
     <br/>
