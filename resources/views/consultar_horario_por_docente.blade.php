 @if(count($horario_docente)>0)
 <br/>
 <div id="form_horario" style="width: 100%;">
 
<form style=" width: 100%;">
  <div style="text-align: center;">
<label><b><h1>Foto</h1></b></label><br/>
<img src="../image/docente/{{$datos_docente[0]->IMAGE}}" style="width: 30%; height: 120px;"><br/>
  </div>
  <br/>
  <table style="width: 100%;">
    <thead>
      <tr>
        <th style="font-weight: normal;">
      &nbsp;  <label><b>Docente: </b>{{$datos_docente[0]->LAST_NAME}} {{$datos_docente[0]->NAME}} </label>
        </th>
        <th style="font-weight: normal;">
      &nbsp;  <label><b>Cédula: </b>{{$datos_docente[0]->CARD}} </label>
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
   
    <table id="horario_" class="table-bordered" style="width: 100%;font-size: 13px; height: 100%; border: solid;" >
            <thead style="width: 10%;">
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
                        <td style="width:10%" class="hora bg-inverse">{{ $hour->since }}-{{ $hour->until }}</td>
                        
                           @foreach($days as $day)
                           @if($horario_docente == null)
                             <td  class="bg-warning" >
                              </td>
                           @else
            @if( count( $horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id) )>0 )
             <td class="bg-success" style="width: 15%;" >
              <div style="">
        <div style="text-align: center;"><b>{{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->reason}}</b></div>

                <div style="text-align: center;">
                  <label><b>Aula:</b> {{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->AULA_NAME}}</label></div>
                 <div style="text-align: center;"> <b>Ubicacíon:</b> {{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->LOCATION}}</div>
                                
                                @if($horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation !='' || $horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation !=null)
                 <b>Observación:</b> {{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation}}
                  @endif
                           </div>
                             </td>
                            @else
             <td class="bg-warning" style="width:15%; height:30px;" >
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
    @else
     <h1>No tiene asignado un horario</h1>
      @endif