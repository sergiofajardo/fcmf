
<!DOCTYPE html>
<html>
<head>
  <title>Horario por Docente</title>
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
     <img src="{$currentsite}/../image/ug.png" style="width: 60px;height: 80px;"><br/>
 <label>Universidad de Guayaquil</label><br/>
 <label>{{$horario_docente[0]->FACULTY_NAME}}</label> <br/> <br/>
<b><label>Reporte de Horario del Docente </label></b><br/>
<img src="{$currentsite}/../image/docente/{{$datos_docente[0]->IMAGE}}" style="width: 100px; height: 120px;"><br/>
  </div>
  

  <table style="width: 100%;">
    <thead>
      <tr>
        <th style="font-weight: normal;">
           &nbsp; <label><b>Docente: </b>{{$datos_docente[0]->LAST_NAME}} {{$datos_docente[0]->NAME}} </label>
        </th>
        <th></th>
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
                  <div style="text-align: center;"><b>{{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->reason}}</b></div>
                  <div style="text-align: center;"><b>{{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->AULA_TYPE}}:</b> {{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->AULA_NAME}}</div>
                  <div><b>Ubicacíon:</b> {{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->LOCATION}}</div>
                                @if($horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation !='' || $horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation !=null)
                  <div><b>Observación:</b> {{$horario_docente->where('day_id',$day->id)->where('hour_id',$hour->id)->first()->observation}}</div>
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