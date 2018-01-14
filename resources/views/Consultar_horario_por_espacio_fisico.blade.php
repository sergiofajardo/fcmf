  @if(count($horario_docente)>0)
 <div id="form_horario" style="width: 100%;">
<form style="border: solid; width: 100%;">
  <label><b>Aula:</b> {{$horario_docente->first()->AULA_NAME}}</label><br/>
   <label><b>Ubicacíon:</b> {{$horario_docente->first()->LOCATION}}</label>
               
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
                  <label><b>{{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->reason}}</b></label><br/>
              <label><b>Docente:</b>{{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->LAST_NAME}} {{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->NAME}}</label><br/>
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

    @else
    <h1>No tiene asignado un horario</h1>
      @endif