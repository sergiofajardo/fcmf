@extends('admin.index')

@section('content')

 <form>
       <div>
        <span><b>Facultades &nbsp;</b></span>
        <select style="width:auto;" name="Facultad" id="cmbfacultades">
        	<option value="0">Seleccione una Facultad</option>
             @foreach($facultades as $item)
<option value="{{$item->id_facultad}}">{{ $item->facultad}}</option>
@endforeach 
</select>&nbsp;
<a>
    <input type="button" name="Consultar" onclick="llenarfacultades();/*se obtiene el id de la facultad*/" value="Consultar" title="Consultar">
</a>
<a href="{{route('facultades/mostrar', ['id_facultad'=> '$(#cmbfacultades).value'])}}">sdasdas</a>
<a><input type="button" name="Crear" onclick="" value="Crear" title="Crear">
</a>
</div>
<div style="height: 100%; width: 100%;">
		<form id="frmfacultades"><br/>
			<label>Logo:</label>
			<img src="evas" height="120" width="160" /><br/><br/>
			<input type="file" name="logo" id="logo"><br/>
			<br/>
			<label>Nombre: &nbsp;&nbsp;  </label>
			<input type="text"  name="facultad" readonly="true" id="facultad"> <br/>
			<label>Teléfono&nbsp; :&nbsp;</label>
			<input type="text" name="telefono" id="telefono"><br/>
			<label>Dirección :</label>
			<input type="text" name="dirccion" id="direccion"><br/>
			
		</form>
	</div>
</form>
<script type="text/javascript">
	function llenarfacultades(){
		

$('input#facultad').val(cmbfacultades.value);
	}
</script>
@endsection
