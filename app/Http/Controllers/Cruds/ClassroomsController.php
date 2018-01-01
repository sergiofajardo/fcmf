<?php

namespace App\Http\Controllers\Cruds;

use App\Classrooms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
     $classrooms = Classrooms::orderBy('code','asc')->where('code','like',"%$request->scope%")->paginate(3);
        return view('Paralelos.index_paralelo')->with(['classrooms'=>$classrooms,'scope'=>$request->scope]);
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
           return view('Paralelos.create_paralelo');
   
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
               $objectClassroom = new Classrooms();
        
        $objectClassroom->code=$request->code;
        $objectClassroom->state=$request->state;
        $objectClassroom->user_create= Auth::user()->id;
        $objectClassroom->save();
         
        return redirect()->route('admin.paralelos.index');
 
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
    public function edit( $classrooms)
    {
        //
               $classrooms= Classrooms::findOrFail($classrooms);
       return view('Paralelos.edit_paralelo')->with(['classroom'=>$classrooms]);
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paralelos  $paralelos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $classrooms)
    {
        //
               $classrooms= Classrooms::findOrFail($classrooms);
        $classrooms->fill($request->all());
        $classrooms->user_update= Auth::user()->id;
        $classrooms->save();
    return redirect()->route('admin.paralelos.index');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paralelos  $paralelos
     * @return \Illuminate\Http\Response
     */
    public function destroy( $classrooms)
    {
        //
              $classrooms= Classrooms::findOrFail($classrooms);
        $classrooms->delete();
    return redirect()->route('admin.paralelos.index');
  
    }
}
