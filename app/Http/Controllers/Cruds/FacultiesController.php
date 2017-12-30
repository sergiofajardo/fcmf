<?php

namespace App\Http\Controllers\Cruds;

use App\Faculties;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class FacultiesController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
             $facultades = Faculties::orderBy('name','asc')->where('name','like',"%$request->scope%")->paginate(3);
        return view('Facultad.index_facultad')->with(['faculties'=>$facultades,'scope'=>$request->scope]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Facultad.create_facultad');
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
        $objectFacultad = new Faculties();
        $objectFacultad->name=$request->name;
        $objectFacultad->address=$request->address;
        $objectFacultad->phone=$request->phone;
        $objectFacultad->image=$request->image;
         
        $objectFacultad->save();
       // dd($request);
        return redirect()->route('admin.facultades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Facultades  $facultades
     * @return \Illuminate\Http\Response
     */
    public function show( $faculties)
    {
          $facultad= Faculties::findOrFail($faculties);
       return view('Facultad.show_facultad')->with(['faculties'=>$facultad]);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facultades  $facultades
     * @return \Illuminate\Http\Response
     */
    public function edit( $faculties)
    {
        //
        $facultad= Faculties::findOrFail($faculties);
       return view('Facultad.edit_facultad')->with(['faculties'=>$facultad]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facultades  $facultades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $faculties)
    {
        $facultad= Faculties::findOrFail($faculties);
        $facultad->fill($request->all());
        $facultad->user_update= Auth::user()->id;
        $facultad->save();
    return redirect()->route('admin.facultades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facultades  $facultades
     * @return \Illuminate\Http\Response
     */
    public function destroy($faculties)
    {
        
        $facultad= Faculties::findOrFail($faculties);
        $facultad->delete();
    return redirect()->route('admin.facultades.index');
            }
   

}
