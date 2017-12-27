<?php

namespace App\Http\Controllers;

use App\Espacios_Fisicos;
use Illuminate\Http\Request;

class Espacios_FisicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return (Espacios_Fisicos::all());
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
     * @param  \App\Espacios_Fisicos  $espacios_Fisicos
     * @return \Illuminate\Http\Response
     */
    public function show(Espacios_Fisicos $espacios_Fisicos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Espacios_Fisicos  $espacios_Fisicos
     * @return \Illuminate\Http\Response
     */
    public function edit(Espacios_Fisicos $espacios_Fisicos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Espacios_Fisicos  $espacios_Fisicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Espacios_Fisicos $espacios_Fisicos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Espacios_Fisicos  $espacios_Fisicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Espacios_Fisicos $espacios_Fisicos)
    {
        //
    }
}
