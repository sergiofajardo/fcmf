 <br/>
 <div id="form_horario" style="width: 100%;">
 
<form style="border: solid; width: 100%;">
  <div style="text-align: center;">
<label><b><h1>Foto</h1></b></label><br/>
<<<<<<< HEAD
<img src="../image/docente/{{$datos_docente[0]->IMAGE}}" style="width: 40%; height: 150px;"><br/>
=======
<img src="../image/docente/{{$datos_docente[0]->IMAGE}}" style="width: 40%; height: 180px;"><br/>
>>>>>>> c424f0b55bce8643c77177beeb3885d0ee7d9c34
  </div>
  <br/>
  <table style="width: 60%;">
  	<thead>
  		<tr>
  			<th style="font-weight: normal;">
  		&nbsp; 	<label><b>Docente: </b>{{$datos_docente[0]->LAST_NAME}} {{$datos_docente[0]->NAME}} </label><br/>	
  			</th>
  		</tr>
  		<tr>
  			<th style="font-weight: normal;">
  	&nbsp;  <label><b>Título: </b>{{$datos_docente[0]->DEGREE}} </label>
  			</th>
  			<th style="font-weight: normal;">
  			&nbsp; <label><b>Teléfono: </b>{{$datos_docente[0]->PHONE}}</label>&nbsp;
  			</th>
  			<tr/>
  			
  	</thead>

   
  </table>
 
   
    <table id="horario_"  class="table table-bordered" style="width: 100%; height: 100%;" >
<<<<<<< HEAD
            <thead style="width: auto;">
=======
            <thead style="width: 100%;">
>>>>>>> c424f0b55bce8643c77177beeb3885d0ee7d9c34
            <tr>
                <th> Horas\Días</th>
              
	                    		
                @foreach($days as $day)
<<<<<<< HEAD
                <th >{{$day->name}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody style="width:auto;">
			  @foreach($hours as $hour)
                    <tr>
                        <td class="hora bg-inverse">{{ $hour->since }}-{{ $hour->until }}</td>
=======
                <th style="text-align: center;" >{{$day->name}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody style="width: 100%;">
			
            		  	
                @foreach($hours as $hour)
                    <tr>
                        <td class="hora bg-inverse" style="text-align: center; vertical-align: middle;">{{ $hour->since }}-{{ $hour->until }}</td>
>>>>>>> c424f0b55bce8643c77177beeb3885d0ee7d9c34
                        
                           @foreach($days as $day)

                           @if($horario_docente == null)
                           	 <td class="bg-warning" >
                        			
                           	 	
                             </td>
                           @else
 						@if( count( $horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id) )>0 )
<<<<<<< HEAD
 						 <td class="bg-success" style="width: auto;" >
=======
 						 <td class="bg-info" style="height:auto; width: 16%;" >
>>>>>>> c424f0b55bce8643c77177beeb3885d0ee7d9c34
 						 			<label><b>{{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->reason}}</b></label><br/><nr/>

 		
 						 			<label><b>Aula:</b> {{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->AULA_NAME}}</label>
 						 			<label><b>Ubicacíon:</b> {{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->LOCATION}}</label>
                        				
                           	 		@if($horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation !='' || $horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation !=null)
 						 			<label><b>Observación:</b> {{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation}}</label>
 						 			@endif
                             </td>
                            @else
<<<<<<< HEAD
						 <td class="bg-warning" style="width: auto;" >
                        		 </td>
                            @endif
                            @endif
=======
						 <td class="bg-success" style="height: auto; width: 16%" >
                        				
                           	 	
                             </td>
                            @endif
                           
						

                           @endif
>>>>>>> c424f0b55bce8643c77177beeb3885d0ee7d9c34
                          @endforeach 
                    </tr>
                @endforeach
                 
            </tbody>
        </table>

    </form>
    </div>