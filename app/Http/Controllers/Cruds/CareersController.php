<?php

namespace App\Http\Controllers\Cruds;

use App\Careers;
use App\Faculties;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Storage;

class CareersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //si no existe el directorio para guardar las imagenes de las carreras se lo crea.
     $carpeta = public_path().'/image/carrera';
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}


        $facultades = Faculties::all();
         $carreras = Careers::orderBy('name','asc')->where('name','like',"%$request->scope%")->paginate(3);
        return view('Carreras.index_carrera')->with(['careers'=>$carreras,'scope'=>$request->scope,'faculties'=>$facultades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

            $faculties= Faculties::orderBy('name','asc')->get();
        return view('Carreras.create_carrera')->with(['faculties'=>$faculties]);
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
          $objectCarrera = new Careers();
        $objectCarrera->name=$request->name;
        $objectCarrera->address=$request->address;
        $objectCarrera->phone=$request->phone;
       $objectCarrera->faculty_id=$request->faculty_id;
        $objectCarrera->mission= $request->mission;
        $objectCarrera->vision= $request->vision;
         $objectCarrera->user_create= Auth::user()->id;
         $objectCarrera->user_update= Auth::user()->id;
        if($request->image != null){
        $img=$request->image;
        $img_route = time().'_'.$img->getClientOriginalName();
        Storage::disk('imgCarreras')->put($img_route, file_get_contents($img->getRealPath() ) );
         
         $objectCarrera->image= $img_route;
         }
         else {
            $objectCarrera->image = 'sin_imagen';
         }

        $objectCarrera->save();
       // dd($request);
        return redirect()->route('admin.carreras.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function show( $careers)
    {
        //

              $carrera= Careers::findOrFail($careers);
              $facultad= Faculties::where('id',$carrera->faculty_id)->first()->name;
       return view('Carreras.show_carrera')->with(['careers'=>$carrera,'faculty'=>$facultad]);
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function edit( $careers)
    {
        //
        $faculties = Faculties::orderBy('name','asc')->get();
             $carrera= Careers::findOrFail($careers);
       return view('Carreras.edit_carreras')->with(['careers'=>$carrera,'faculties'=>$faculties]);
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $careers)
    {
        //
           $carrera= Careers::findOrFail($careers);
         if($request->image != null){
            $img_ant = $carrera->image;
        $carrera->name= $request->name;
        $carrera->address= $request->address;
        $carrera->phone= $request->phone;
        $carrera->mission = $request->mission;
        $carrera->vision = $request->vision;
        $carrera->user_update= Auth::user()->id;

        $img=$request->image;
        $img_route = time().'_'.$img->getClientOriginalName();
        Storage::disk('imgCarreras')->put($img_route, file_get_contents($img->getRealPath() ) );
        $carrera->image= $img_route;
        if(file_exists(public_path('image/carrera/'.$img_ant)))
             unlink(public_path('image/carrera/'.$img_ant));

       }else{
        $carrera->name= $request->name;
        $carrera->address= $request->address;
        $carrera->phone= $request->phone;
        $carrera->mission = $request->mission;
        $carrera->vision = $request->vision;
        $carrera->user_update= Auth::user()->id;
             }

        $carrera->save();
    return redirect()->route('admin.carreras.index');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function destroy($careers)
    {
        //
          $careers= Careers::findOrFail($careers);
        $careers->delete();
    return redirect()->route('admin.carreras.index');
    
    }
}
