<?php

namespace App\Http\Controllers;

use App\Horas;
use Illuminate\Http\Request;

class HorasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return (Horas::all());
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
     * @param  \App\Horas  $horas
     * @return \Illuminate\Http\Response
     */
    public function show(Horas $horas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Horas  $horas
     * @return \Illuminate\Http\Response
     */
    public function edit(Horas $horas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Horas  $horas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horas $horas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Horas  $horas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horas $horas)
    {
        //
    }
}
