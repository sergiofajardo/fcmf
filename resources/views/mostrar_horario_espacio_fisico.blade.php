    <table id="horario_"  class="table table-bordered" style="width: 100%; height: 100%;" >
            <thead>
            <tr>
                <th> Horas\Días</th>
              
	                    		
                @foreach($days as $day)
                <th >{{$day->name}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
			
            		  	
                @foreach($hours as $hour)
                    <tr>
                        <td class="hora bg-inverse">{{ $hour->since }}-{{ $hour->until }}</td>
                        
                           @foreach($days as $day)

                           @if($horario_por_hora == null)
                           	 <td class="bg-success" >
                        				<input type="button" id="btn-asignar{{$day->id}}{{$hour->id}}" onclick="asignar({{$day->id}},{{$hour->id}});" type="button" class="btn btn-primary" data-toggle="modal" data-day="{{$day->id}}" data-hour="{{$hour->id}}" data-target="#Schedule_modal" value="Aignar" >
                           	 	
                             </td>
                           @else
 						@if( count( $horario_por_hora->where('day_id',$day->id)->where('hour_id',$hour->id) )>0 )
 						 <td class="bg-success" >
              <div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle"
          data-toggle="dropdown">
    Opciones <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" style="padding: 0px;width: 10px;">
    <li style="padding: 0px;">
      <a type="button" style="width:100%;" id="btn-asignar{{$day->id}}{{$hour->id}}" onclick="editar({{$horario_por_hora->where('day_id',$day->id)->where('hour_id',$hour->id)->first()}});" type="button" class="btn btn-warning" data-toggle="modal" data-target="#Schedule_modal_edit" >Editar</a>
    </li>
    <li style="padding: 0px;">
      <a type="button" style="width:100%;" id="btn-eliminar{{$day->id}}{{$hour->id}}" onclick="eliminar({{$horario_por_hora->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->id}});" type="button" class="btn btn-danger" >Eliminar</a>
    </li>
    
  </ul>
</div>                           	 	
                             </td>
                            @else
						 <td class="bg-success" >
                        				<input type="button" id="btn-asignar{{$day->id}}{{$hour->id}}" onclick="asignar({{$day->id}},{{$hour->id}});" type="button" class="btn btn-primary" data-toggle="modal" data-target="#Schedule_modal" value="Asignar" >
                           	 	
                             </td>
                            @endif
                           
						

                           @endif
                          @endforeach 
                    </tr>
                @endforeach
                 
            </tbody>
        </table>