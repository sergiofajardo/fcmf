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

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
           $carreras = $request->carrera; //lee los checkbox seleccionados 
       $docente = new Teachers();
        $docente->name=$request->name;
        $docente->last_name=$request->last_name;
        $docente->phone=$request->phone;
        $docente->degree= $request->degree;
        $docente->state= $request->state;
        $docente->card= $request->card;
        $docente->user_create= Auth::user()->id;
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
            
           //crea el resgistro de docente_carreras
            for ($i=0; $i <count($carreras) ; $i++) { 
                $objectTeachers_careers = new Teachers_Careers();

                $objectTeachers_careers->teacher_id = $docente->id;
                $objectTeachers_careers->career_id = $carreras[$i];
                $objectTeachers_careers->user_create = Auth::user()->id;
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
             
       $teacher_careers = Teachers_Careers::where('teacher_id',$teachers)->pluck('career_id');//obtiene el id de las carreras que tiene asignado el docente
       
        if( count($teacher_careers) >0){ //se valida si el docente tiene asignada alguna carrera 

            $career_name = Careers::findOrFail($teacher_careers);//e obtiene la informacion de las carreras
           
         $faculties= new Faculties;
          $faculties = Faculties::where('id', Careers::where('id',$teacher_careers)->first()->faculty_id )->get();
        
        }
        else {
             $teacher_careers = new Teachers_Careers;
          
                $teacher_careers->name= 'No tiene asignada carreras';
             $faculties= new Faculties;
           $faculties=null;
          //  dd($faculties);
        //  $faculties->first()->name = 'No tiene facultad asignada';
         $career_name = new Careers;
          $career_name= null;
         
        }
        // dd($career_name);

        $docente = teachers::findOrFail($teachers);
      
        return view('Docentes.show_docente')->with(['teacher'=>$docente ,'faculties'=>$faculties,'teacher_careers'=>$career_name]);
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
        $teacher_careers = Teachers_Careers::where('teacher_id',$teachers)->get();
        
        if( count($teacher_careers) >0){ //se valida si el docente tiene asignada alguna carrera 
        $carrera_pertenece = Careers::where('id', $teacher_careers->first()->career_id)->get();
        }
        else {
            $carrera_pertenece = new Careers;
            $carrera_pertenece->faculty_id = '0';
        }
        $faculties= Faculties::orderBy('name', 'asc')->get();
          $docente= Teachers::findOrFail($teachers);
       return view('Docentes.edit_docente')->with(['teacher'=>$docente,'faculties'=>$faculties,'teacher_careers'=>$teacher_careers,'carrera_pertenece'=>$carrera_pertenece]);
      
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
            $carreras_docente = $request->carrera;

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


            $objects_delete_carrera_docente = Teachers_Careers::where('teacher_id', $docente->id);
            $objects_delete_carrera_docente->delete();
            
  for ($i=0; $i <count($carreras_docente) ; $i++) { 
                $objectTeachers_careers = new Teachers_Careers();

                $objectTeachers_careers->teacher_id = $docente->id;
                $objectTeachers_careers->career_id = $carreras_docente[$i];
                $objectTeachers_careers->user_create = Auth::user()->id;
                $objectTeachers_careers->save();

            }
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


         public function getcareersSelectedbyfaculty( Request $request){
             
            $description = 'Seleccione la(s) carrera(s) en la que va a dar clases el docente :';
            $carrera_docente = Teachers_Careers::where('teacher_id', $request->teacher_id)->get();
            $careers = Careers::orderBy('name','asc')->where('faculty_id', $request->faculties_id)->get();
          
            return view('select_carreras_seleccionadas')->with(['objects'=> $careers, 'description'=>$description, 'carrera_docente'=>$carrera_docente]);

        }


        public function getcareersbyfaculty( Request $request){

            $description = 'Seleccione las carreras en las que va a dar clases el docente :';
            $careers = Careers::orderBy('name','asc')->where('faculty_id', $request->faculties_id)->get();
           return view('select_carreras')->with(['objects'=> $careers, 'description'=>$description]);

        }
}
