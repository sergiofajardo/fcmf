<?php

namespace App\Http\Controllers;

use App\Dias;
use Illuminate\Http\Request;

class DiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return (Dias::all());
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
     * @param  \App\Dias  $dias
     * @return \Illuminate\Http\Response
     */
    public function show(Dias $dias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dias  $dias
     * @return \Illuminate\Http\Response
     */
    public function edit(Dias $dias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dias  $dias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dias $dias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dias  $dias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dias $dias)
    {
        //
    }
}
