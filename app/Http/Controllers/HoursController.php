<?php

namespace App\Http\Controllers;

use App\Hours;
use Illuminate\Http\Request;

class HoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return (Hours::all());
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
    public function show(Hours $hours)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Horas  $horas
     * @return \Illuminate\Http\Response
     */
    public function edit(Hours $hours)
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
    public function update(Request $request, Hours $hours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Horas  $horas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hours $hours)
    {
        //
    }
}
