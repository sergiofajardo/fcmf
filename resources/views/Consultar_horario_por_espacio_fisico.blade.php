  @if(count($horario_docente)>0)
  <label><b>Aula:</b> {{$horario_docente->first()->AULA_NAME}}</label><br/>
   <label><b>Ubicacíon:</b> {{$horario_docente->first()->LOCATION}}</label>
               
    <table id="horario_"  class="table-bordered" style="border: solid; width: 100%;font-size:12px; height: 100%;" >
            <thead style="width: 100%;">
            <tr style="width: auto;">
                <th> Horas\Días</th>
              @foreach($days as $day)
                <th >{{$day->name}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody style="width:100%;">
        @foreach($hours as $hour)
                    <tr>
                        <td style="width:10%;" class="hora bg-inverse">{{ $hour->since }}-{{ $hour->until }}</td>
                        
                           @foreach($days as $day)
                @if($horario_docente == null)
                             <td style="width: 15%;" class="bg-warning" >
                             </td>
                           @else
            @if( count( $horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id) )>0 )
             <td class="bg-success" style="width: 15%;" >
                  <label><b>{{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->reason}}</b></label><br/>
              <label><b>Docente: </b>{{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->LAST_NAME}} {{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->NAME}}</label><br/>
            @if($horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation !='' || $horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation !=null)
                  <label><b>Observación:</b> {{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation}}</label>
                  @endif
                             </td>
                            @else
             <td class="bg-warning" style="width: 15%;" >
                             </td>
                            @endif
                            @endif
                          @endforeach 
                    </tr>
                @endforeach
                 
            </tbody>
        </table>

    @else
    <h1>No tiene asignado un horario</h1>
      @endif