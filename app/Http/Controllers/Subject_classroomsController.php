<?php

namespace App\Http\Controllers;

use App\Subject_classrooms;
use Illuminate\Http\Request;

class Subject_classroomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return (Subject_classrooms::all());
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
    public function show(Subject_classrooms $subject_classrooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materias_paralelos  $materias_paralelos
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject_classrooms $subject_classrooms)
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
    public function update(Request $request, Subject_classrooms $subject_classrooms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materias_paralelos  $materias_paralelos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject_classrooms $subject_classrooms)
    {
        //
    }
}
