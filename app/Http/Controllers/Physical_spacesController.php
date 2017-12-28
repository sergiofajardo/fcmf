<?php

namespace App\Http\Controllers;

use App\Physical_spaces;
use Illuminate\Http\Request;

class Physical_spacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return (Physical_spaces::all());
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
    public function edit(Physical_spaces $physical_spaces)
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
    public function update(Request $request, Physical_spaces $physical_spaces)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Espacios_Fisicos  $espacios_Fisicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Physical_spaces $physical_spaces)
    {
        //
    }
}
