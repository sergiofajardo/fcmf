<?php

namespace App\Http\Controllers;

use App\Carreras;
use Illuminate\Http\Request;

class CarrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return (Carreras::all());
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
     * @param  \App\Carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function show(Carreras $carreras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function edit(Carreras $carreras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carreras $carreras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carreras $carreras)
    {
        //
    }
}
