 <br/>
 <div id="form_horario" style="width: 100%;">
 
<form style="border: solid; width: 100%;">
  <div style="text-align: center;">
<label><b><h1>Foto</h1></b></label><br/>
<img src="../image/docente/{{$datos_docente[0]->IMAGE}}" style="width: 40%; height: 150px;"><br/>
  </div>
  <br/>
  <table style="width: 60%;">
    <thead>
      <tr>
        <th style="font-weight: normal;">
      &nbsp;  <label><b>Docente: </b>{{$datos_docente[0]->LAST_NAME}} {{$datos_docente[0]->NAME}} </label><br/> 
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
            <thead style="width: auto;">
            <tr>
                <th> Horas\Días</th>
              
                          
                @foreach($days as $day)
                <th >{{$day->name}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody style="width:auto;">
        @foreach($hours as $hour)
                    <tr>
                        <td class="hora bg-inverse">{{ $hour->since }}-{{ $hour->until }}</td>
                        
                           @foreach($days as $day)

                           @if($horario_docente == null)
                             <td class="bg-warning" >
                              
                              
                             </td>
                           @else
            @if( count( $horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id) )>0 )
             <td class="bg-success" style="width: auto;" >
                  <label><b>{{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->reason}}</b></label><br/><nr/>

    
                  <label><b>Aula:</b> {{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->AULA_NAME}}</label>
                  <label><b>Ubicacíon:</b> {{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->LOCATION}}</label>
                                
                                @if($horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation !='' || $horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation !=null)
                  <label><b>Observación:</b> {{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation}}</label>
                  @endif
                             </td>
                            @else
             <td class="bg-warning" style="width: auto;" >
                             </td>
                            @endif
                            @endif
                          @endforeach 
                    </tr>
                @endforeach
                 
            </tbody>
        </table>

    </form>
    </div>