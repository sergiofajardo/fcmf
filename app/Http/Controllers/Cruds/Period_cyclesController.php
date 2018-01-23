<?php

namespace App\Http\Controllers\Cruds;

use App\Period_cycles;
use App\Schedules_physicals_spaces;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class Period_cyclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
               $periodo_ciclo = Period_cycles::orderBy('year','asc')->get();
        return view('Periodo_ciclo.index_periodo_ciclo')->with(['period_cycles'=>$periodo_ciclo,'scope'=>$request->scope]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      return view('Periodo_ciclo.create_periodo_ciclos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validar_registro = Period_cycles::where('year',$request->year)->where('cycle',$request->cycle)->get();
        if( count($validar_registro)>0){
        flash('Ya existe un periodo igual creado. Cambie el año lectivo o el ciclo!')->warning();
        return back()->withInput();
        
        }else{


        $objectPeriod_cycle = new Period_cycles();
        $objectPeriod_cycle->year=$request->year;
        $objectPeriod_cycle->cycle=$request->cycle;
        $objectPeriod_cycle->state=$request->state;
        $objectPeriod_cycle->user_create= Auth::user()->id;
        $objectPeriod_cycle->save();
          
      
       flash('Periodo registrado correctamente')->success();
        return redirect()->route('admin.periodo_lectivo.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Period_cycles  $period_cycles
     * @return \Illuminate\Http\Response
     */
    public function show(Period_cycles $period_cycles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Period_cycles  $period_cycles
     * @return \Illuminate\Http\Response
     */
    public function edit( $period_cycles)
    {
        //
            $period_cycles= Period_cycles::findOrFail($period_cycles);
       return view('Periodo_ciclo.edit_periodo_ciclos')->with(['period_cycle'=>$period_cycles]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Period_cycles  $period_cycles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $period_cycles)
    {
        //
            $validar = Period_cycles::where('cycle',$request->cycle)->where('year',$request->year)->where('id','!=',$period_cycles)->get();
            if( count($validar)>0)
            {
    flash('Ya existe creado un periodo lectivo con ese año y ciclo')->warning();
    return back()->withInput();
            }else{
          $period_cycles= Period_cycles::findOrFail($period_cycles);
        $period_cycles->fill($request->all());
        $period_cycles->user_update= Auth::user()->id;
        $period_cycles->save();
        flash('Registro actualizado correctamente')->success();
    return redirect()->route('admin.periodo_lectivo.index');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Period_cycles  $period_cycles
     * @return \Illuminate\Http\Response
     */
    public function destroy($period_cycles)
    {
        //
        $valida_horario = Schedules_physicals_spaces::where('period_cycle_id',$period_cycles)->get();
        if(count($valida_horario)>0){
        flash('No se puede eliminar este periodo, tiene asignado uno o más horarios')->warning();
        return redirect()->route('admin.periodo_lectivo.index');
        }else{ 
            $period_cycles= Period_cycles::findOrFail($period_cycles);
        $period_cycles->delete();
        flash('Periodo eliminado correctamente')->success();
    return redirect()->route('admin.periodo_lectivo.index');
    }
            
    }
}
