
<!DOCTYPE html>
<html>
<head>
  <title>sdfdfdsf</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
#horario_docente {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#horario_docente td, #horario_docente th {
    border: 1px solid #ddd;
    padding: 8px;
}

#horario_docente tr:nth-child(even){background-color: #f2f2f2;}

#horario_docente tr:hover {background-color: #ddd;}

#horario_docente th {
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
<label><b><h3>Reporte de Horario Por Espacio Físico </h3></b></label>
<div style="text-align: left; margin-left: 5%;">
  <label><b>Aula:</b> {{$horario_docente->first()->AULA_NAME}}</label><br/>
  <label><b>Tipo:</b> {{$horario_docente->first()->AULA_TYPE}}</label><br/>
   <label><b>Ubicacíon:</b> {{$horario_docente->first()->LOCATION}}</label>
 </div>
            <table id="horario_docente" class="rwd-table" style="width: 100%;">
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
                           @if($horario_docente == null)
                             <td class="bg-warning" >
                              </td>
                           @else
            @if( count( $horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id) )>0 )
             <td style="width: auto;" >
                <div style="text-align: center; font-size: 15px;"> <b>{{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->reason}}</b></div>
                <div style="font-size: 13px;"><b>Asignado a: </b>{{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->LAST_NAME}}  {{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->NAME}}</div>
                  @if($horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation !='' || $horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation !=null)
                  <div style="font-size:13px;"><b>Observación:</b><br/> {{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation}}</div>
                  @endif
                             </td>
                            @else
             <td class="bg-warning" style=" width: auto;" >
                              </td>
                            @endif
                            @endif
                          @endforeach 
                    </tr>
                @endforeach
                 
            </tbody>
            </table>
</body>
</html>