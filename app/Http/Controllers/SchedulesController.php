<?php

namespace App\Http\Controllers;

use App\Schedules;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return (Schedules::all());
        //
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
     * @param  \App\Horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function show(Schedules $schedules)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedules $schedules)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedules $schedules)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedules $schedules)
    {
        //
    }
}
