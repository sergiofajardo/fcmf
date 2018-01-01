<?php

namespace App\Http\Controllers\Cruds;

use App\Physical_spaces;
use App\Faculties;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Physical_spacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
     $espacio_fisico = Physical_spaces::orderBy('name','asc')->where('name','like',"%$request->scope%")->paginate(3);
     $facultades = Faculties::all();
        return view('Espacios_fisicos.index_espacio_fisico')->with(['physicals_spaces'=>$espacio_fisico, 'faculties'=>$facultades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $faculties = Faculties::orderBy('name','asc')->get();
           return view('Espacios_Fisicos.create_espacio_fisico')->with(['faculties'=>$faculties]);
   
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
              $objectPhysical_space = new Physical_spaces();
        $objectPhysical_space->name=$request->name;
        $objectPhysical_space->type=$request->type;
        $objectPhysical_space->location=$request->location;
        $objectPhysical_space->state=$request->state;
        $objectPhysical_space->faculty_id=$request->faculty_id;
         $objectPhysical_space->user_create= Auth::user()->id;
        $objectPhysical_space->save();
       // dd($request);
        return redirect()->route('admin.espacios_fisicos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Espacios_Fisicos  $espacios_Fisicos
     * @return \Illuminate\Http\Response
     */
    public function show(Physical_spaces $physical_spaces)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Espacios_Fisicos  $espacios_Fisicos
     * @return \Illuminate\Http\Response
     */
    public function edit( $physical_spaces)
    {
        //
                $physical_spaces= Physical_spaces::findOrFail($physical_spaces);
                $faculties= Faculties::orderBy('name','asc')->get();
       return view('Espacios_fisicos.edit_espacio_fisico')->with(['physical_space'=>$physical_spaces, 'faculties'=>$faculties]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Espacios_Fisicos  $espacios_Fisicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $physical_spaces)
    {
        //
                $physical_spaces= Physical_spaces::findOrFail($physical_spaces);
        $physical_spaces->fill($request->all());
        $physical_spaces->user_update= Auth::user()->id;
        $physical_spaces->save();
    return redirect()->route('admin.espacios_fisicos.index');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Espacios_Fisicos  $espacios_Fisicos
     * @return \Illuminate\Http\Response
     */
    public function destroy( $physical_spaces)
    {
        //
                $espacios_fisicos= Physical_spaces::findOrFail($physical_spaces);
        $espacios_fisicos->delete();
    return redirect()->route('admin.espacios_fisicos.index');
  
    }
}
