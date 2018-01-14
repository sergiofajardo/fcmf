<?php

namespace App\Http\Controllers\Cruds;

use App\Schedules_physicals_spaces;
use App\Teachers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Storage;
use App\Faculties;
use App\Careers;
use App\Teachers_Careers;
use DataTables;
use DB;
use Session;
use redirect;

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
        
        $teachers = Teachers::orderBy('name','asc')->get();
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
             //$teacher_careers = new Teachers_Careers; 
              //  $teacher_careers->name= 'No tiene asignada carreras';
             $faculties= new Faculties;
           $faculties=null;
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

            if($carreras_docente != null){
        //Eliminar Carrera_docente
    $objectTeachers_ = Teachers_Careers::where('teacher_id', $docente->id)->whereNotIn('career_id',$carreras_docente)->pluck('id'); //se obtienen los id de las carreras_docente a eliminar

           $valida_delete = Schedules_physicals_spaces::wherein('teacher_career_id', $objectTeachers_)->get();
           
           if(count($valida_delete)<=0 ){
                $borrar = Teachers_Careers::wherein('id',$objectTeachers_);
             $borrar->delete(); 
        //end eliminar carrera_docente
           }else{
            flash('Una de las carreras que desea quitar tiene asignado un horario')->error()->important();
            
            return redirect()->back();
           }

  foreach ($carreras_docente as $carrera) { 
                $objectTeachers_careers = Teachers_Careers::where('teacher_id', $docente->id)->where('career_id',$carrera)->first();

                 if($objectTeachers_careers== null || count($objectTeachers_careers)<=0){
              //si el docente no tiene creada una carrera que se envia, se la crea
                $crear = new Teachers_Careers();
                $crear->teacher_id = $docente->id;
                $crear->career_id = $carrera;
                $crear->user_create = Auth::user()->id;
                $crear->save();
                   }
                    else{

                      
                }

            }
     flash('Docente Actualizado Correctamente')->success();
             return redirect()->route('admin.docentes.index');
        }else{
            flash('Debe elegir al menos una carrera')->warning();
            return redirect()->back()->withInput();
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Docentes  $docentes
     * @return \Illuminate\Http\Response
     */


 public function consulta_docente()
    {
        //
         return DataTables::of(Teachers::orderBy('name','asc')->get())->make(true);
    }


    public function destroy( $teachers)
    {
        //
        $validar_carrera = Teachers_Careers::where('teacher_id', $teachers)->pluck('id');
$validar_horario = Schedules_physicals_spaces::whereIn('teacher_career_id', $validar_carrera)->get();
                if(count($validar_horario)<=0 ){
        $carrera_docente = Teachers_Careers::where('teacher_id',$teachers);
        $carrera_docente->delete();
        $teacher = Teachers::findOrFail($teachers);
        $img_ant = $teacher->first()->image;
        if(file_exists(public_path('image/docente/'.$img_ant)))
             unlink(public_path('image/docente/'.$img_ant));

        $teacher->delete();
        flash('Docente Eliminado Correctamente')->warning();
        return redirect()->route('admin.docentes.index');
        }else{
        flash('El Docente tiene asignado un horario. No fue elimimnado!!')->warning();
        return redirect()->route('admin.docentes.index');   
        }
    }


         public function getcareersSelectedbyfaculty( Request $request){
             //obtiene y muestra las carreras en las que da clase el docente
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
