
<!DOCTYPE html>
<html>
<head>
  <title>Horario por Espacio Físico</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
#horario_espacio_fisico {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#horario_espacio_fisico td, #horario_espacio_fisico th {
    border: 1px solid #ddd;
    padding: 8px;
}

#horario_espacio_fisico tr:nth-child(even){background-color: #f2f2f2;}

#horario_espacio_fisico tr:hover {background-color: #ddd;}

#horario_espacio_fisico th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<body>

  <div style="text-align: center;">
   <img src="{$currentsite}/../image/ug.png" style="width: 60px;height: 80px;"><br/>
 <label>Universidad de Guayaquil</label><br/>
 <label>{{$horario_espacio_fisico[0]->FACULTY_NAME}}</label> <br/><br/>
<b><label>Reporte de Horario Por Espacio Físico </label></b>
<div style="text-align: left; margin-left: 5%;">
  <label><b>Código:</b> {{$horario_espacio_fisico->first()->AULA_NAME}}</label><br/>
  <label><b>Tipo:</b> {{$horario_espacio_fisico->first()->AULA_TYPE}}</label><br/>
   <label><b>Ubicacíon:</b> {{$horario_espacio_fisico->first()->LOCATION}}</label>
 </div>
            <table id="horario_espacio_fisico" class="rwd-table" style="width: 100%;">
               <thead style="width: 100%;">
            <tr>
                <th> Horas\Días</th>
               @foreach($days as $day)
                <th >{{$day->name}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody style="width: 100%;">
                     @foreach($hours as $hour)
                    <tr>
                        <td style="width: 10%;">{{ $hour->since }}-{{ $hour->until }}</td>
                         @foreach($days as $day)
                           @if($horario_espacio_fisico == null)
                             <td class="bg-warning" style="width: 10%;" >
                              </td>
                           @else
            @if( count( $horario_espacio_fisico->where('day_id',$day->id)->where('hour_id',$hour->id) )>0 )
             <td style="width: 15%;" >
                <div style="font-size: 14px;"> <b>{{$horario_espacio_fisico->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->reason}}</b></div>
                <div style="font-size: 11px;"><b>Asignado a: </b>{{$horario_espacio_fisico->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->LAST_NAME}}  {{$horario_espacio_fisico->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->NAME}}</div>
                  @if($horario_espacio_fisico->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation !='' || $horario_espacio_fisico->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation !=null)
                  <div style="font-size:11px;"><b>Observación:</b><br/> {{$horario_espacio_fisico->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation}}</div>
                  @endif
                             </td>
                            @else
             <td class="bg-warning" style=" width: 15%;" >
                              </td>
                            @endif
                            @endif
                          @endforeach 
                    </tr>
                @endforeach
                 
            </tbody>
            </table>
              <br/>
            <footer class="sticky-footer">
      <div class="container">
        <div style="text-align: center;">
          <small>Reporte generado con fines académicos.</small>
        </div>
      </div>
    </footer>
</body>
</html>