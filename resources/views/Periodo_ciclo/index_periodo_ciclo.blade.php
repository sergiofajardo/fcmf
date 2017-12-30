
@extends('admin.index')

@section('content')

    <div class="container">
 <div class="row">
            <div  style="width: 100%; height: 100%;">
                <div class="panel panel-default">
                          
                    <div class="panel-heading">Periodos y Ciclos </div><br/>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                  <a href="{{ route('admin.periodo_lectivo.create') }}" class="btn btn-primary">Crear</a>
                    </div>
                 <!--   <div class="col-md-4">
                         {!! Form::open(['route'=>'admin.facultades.index','method'=>'GET']) !!}
                        {!! Form::text('scope',$scope,['class'=>'form-control']) !!}
                        
                        {!! Form::submit('Buscar',["class"=>"btn btn-success"]) !!}
                                                                {!! Form::close() !!}

                      
                    </div>
                -->
                   
                        </div>  

                        <table class="table" style="height: 100%;width: 100%;" >
                            <thead>
                            <th>Periodo </th>
                            <th>Ciclo</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                            </thead>
                            <tbody>
                            @foreach( $period_cycles as $period_cycle)
                                <tr>
                                    <td style="width: 35%">{{ $period_cycle->year }}</td>
                                    <td style="width: 10%">{{ $period_cycle->cycle }}</td>
                                    <td style="width: 35%">{{ $period_cycle->state }}</td>
                                    <td style="width: 20%">

                                        {{link_to_route('admin.periodo_lectivo.edit','Editar',[$period_cycle->id],["class"=>"btn btn-warning btn-xs"])}}
                                        
                                        <br/><br/>
                                        {!! Form::open(['route'=>['admin.periodo_lectivo.destroy',$period_cycle->id],'method'=>'DELETE']) !!}
                                        {!! Form::submit('Borrar',["class"=>"btn btn-danger btn-xs"]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                        {!! $period_cycles->render() !!}
           <p>Página {{$period_cycles->currentPage()}} de {{$period_cycles->lastPage()}}</p>
        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection