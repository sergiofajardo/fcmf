<?php

namespace App\Http\Controllers\Cruds;

use App\Teachers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Storage;
use App\Faculties;
use App\Careers;
use App\Teachers_Careers;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         $carpeta = public_path().'/image/docente';
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}

        $teachers = Teachers::orderBy('name','asc')->where('name','like',"%$request->scope%")->paginate(3);
         return view('Docentes.index_docentes')->with(['teachers'=> $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $faculties = Faculties::orderBy('name', 'asc')->get();
        $careers = Careers::orderBy('name', 'asc')->get();
        return view('Docentes.create_docente')->with(['faculties'=>$faculties, 'careers'=>$careers]);
    }

        public function getcareersbyfaculty( Request $request){
                $description = 'Seleccione las carreras a las que va a dar clases el docente';
            $careers = Careers::where('faculty_id', $request->faculties_id)->get();
           return view('select_carreras')->with(['objects'=> $careers, 'description'=>$description]);

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
           $carreras = $request->carrera;
       $docente = new Teachers();
        $docente->name=$request->name;
        $docente->last_name=$request->last_name;
        $docente->phone=$request->phone;
        $docente->degree= $request->degree;
        $docente->state= $request->state;
        $docente->card= $request->card;
        if($request->image != null){
        $img=$request->image;
        $img_route = time().'_'.$img->getClientOriginalName();
        Storage::disk('imgDocentes')->put($img_route, file_get_contents($img->getRealPath() ) );
         
         $docente->image= $img_route;
         }
         else {
            $docente->image = 'sin_imagen';
         }
        $docente->save();
            
           
            for ($i=0; $i <count($carreras) ; $i++) { 
                $objectTeachers_careers = new Teachers_Careers();

                $objectTeachers_careers->teacher_id = $docente->id;
                $objectTeachers_careers->career_id = $carreras[$i];
                $objectTeachers_careers->save();

            }

               
       // dd($request);
        return redirect()->route('admin.docentes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function show( $teachers)
    {
        //
        $docente = teachers::findOrFail($teachers);
        return view('Docentes.show_docente')->with(['teacher'=>$docente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function edit( $teachers)
    {
        //
          $docente= Teachers::findOrFail($teachers);
       return view('Docentes.edit_docente')->with(['teacher'=>$docente]);
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $teachers)
    {
        //
           $docente= Teachers::findOrFail($teachers);
        if($request->image != null){
            $img_ant = $docente->image;
        $docente->name= $request->name;
        $docente->last_name= $request->last_name;
        $docente->phone= $request->phone;
        $docente->degree = $request->degree;
        $docente->state = $request->state;
        $docente->card = $request->card;
        $docente->user_update= Auth::user()->id;

        $img=$request->image;
        $img_route = time().'_'.$img->getClientOriginalName();
        Storage::disk('imgDocentes')->put($img_route, file_get_contents($img->getRealPath() ) );
        $docente->image= $img_route;
        if(file_exists(public_path('image/docente/'.$img_ant)))
             unlink(public_path('image/docente/'.$img_ant));

       }else{
       $docente->name= $request->name;
        $docente->last_name= $request->last_name;
        $docente->phone= $request->phone;
        $docente->degree = $request->degree;
        $docente->state = $request->state;
        $docente->card = $request->card;
        $docente->user_update= Auth::user()->id;
             }

        $docente->save();
         return redirect()->route('admin.docentes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function destroy( $teachers)
    {
        //
        $carrera_docente = Teachers_Careers::where('teacher_id',$teachers);
        $carrera_docente->delete();
        $teacher = Teachers::findOrFail($teachers);
        $teacher->delete();
        return redirect()->route('admin.docentes.index');
    }
}
