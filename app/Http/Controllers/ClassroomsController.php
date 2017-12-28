<?php

namespace App\Http\Controllers;

use App\Classrooms;
use Illuminate\Http\Request;

class ClassroomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return (Classrooms::all());
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
    public function show(Classrooms $classrooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paralelos  $paralelos
     * @return \Illuminate\Http\Response
     */
    public function edit(Classrooms $classrooms)
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
    public function update(Request $request, Classrooms $classrooms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paralelos  $paralelos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classrooms $classrooms)
    {
        //
    }
}
