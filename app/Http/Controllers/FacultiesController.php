<?php

namespace App\Http\Controllers;

use App\Faculties;
use Illuminate\Http\Request;

class FacultiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $faculties = Faculties::orderBy('name','asc')->where('name','like',"%$request->scope%")->paginate(5);

        return view('Facultad.index')->with(['faculties'=>$faculties,'scope'=>$request->scope]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Facultad.createFacultie');
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
     * @param  \App\Facultades  $facultades
     * @return \Illuminate\Http\Response
     */
    public function show(Request $faculties)
    {
        $facultad_ = Facultades::where('id', '=',$faculties->id)->get();
        if(!is_null($facultad_))
            return $facultad_;
        else
            return Response('no encontrado',404);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facultades  $facultades
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculties $faculties)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facultades  $facultades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculties $faculties)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facultades  $facultades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculties $faculties)
    {
        //
    }

    public function getVista(){
        $facultades = Faculties::all();
         if(!is_null($facultades))
        return view('Facultad.facultad')->with(['facultades'=>$facultades]);
    else 
        return Response('no existen facultades',404);
    }
}
