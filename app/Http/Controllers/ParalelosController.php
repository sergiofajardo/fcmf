<?php

namespace App\Http\Controllers;

use App\Paralelos;
use Illuminate\Http\Request;

class ParalelosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return (Paralelos::all());
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
     * @param  \App\Paralelos  $paralelos
     * @return \Illuminate\Http\Response
     */
    public function show(Paralelos $paralelos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paralelos  $paralelos
     * @return \Illuminate\Http\Response
     */
    public function edit(Paralelos $paralelos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paralelos  $paralelos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paralelos $paralelos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paralelos  $paralelos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paralelos $paralelos)
    {
        //
    }
}
