<?php

namespace App\Http\Controllers;

use App\Materias_paralelos;
use Illuminate\Http\Request;

class Materias_paralelosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return (Materias_paralelos::all());
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
     * @param  \App\Materias_paralelos  $materias_paralelos
     * @return \Illuminate\Http\Response
     */
    public function show(Materias_paralelos $materias_paralelos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materias_paralelos  $materias_paralelos
     * @return \Illuminate\Http\Response
     */
    public function edit(Materias_paralelos $materias_paralelos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materias_paralelos  $materias_paralelos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materias_paralelos $materias_paralelos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materias_paralelos  $materias_paralelos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materias_paralelos $materias_paralelos)
    {
        //
    }
}
