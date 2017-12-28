<?php

namespace App\Http\Controllers;

use App\Facultades;
use Illuminate\Http\Request;

class FacultadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        return (Facultades::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Facultades  $facultades
     * @return \Illuminate\Http\Response
     */
    public function show(Request $id_facultad)
    {
        $facultad_ = Facultades::where('id_facultad', '=',$id_facultad->id_facultad)->get();
        if(!is_null($facultad_))
            return $facultad_;
        else
            return Response('no encontrado',404);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facultades  $facultades
     * @return \Illuminate\Http\Response
     */
    public function edit(Facultades $facultades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facultades  $facultades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facultades $facultades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facultades  $facultades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facultades $facultades)
    {
        //
    }

    public function getVista(){
        $facultades = Facultades::all();
         if(!is_null($facultades))
        return view('Facultad.facultad')->with(['facultades'=>$facultades]);
    else 
        return Response('no existen facultades',404);
    }
}
