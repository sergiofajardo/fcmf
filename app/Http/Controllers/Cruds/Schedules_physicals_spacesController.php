<?php

namespace App\Http\Controllers\Cruds;

use App\Schedules_physicals_spaces;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Days;
use App\Hours;
use App\Faculties;
use App\Careers;
use App\Teachers;
use App\Period_cycles;
use App\Teachers_Careers;
use App\Physical_spaces;
use Illuminate\Support\Facades\Auth;

class Schedules_physicals_spacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  
        $period_cycle = Period_cycles::where('state','Activo')->get();
               $day= Days::orderBy('id','asc')->get();
        $hours = Hours::orderBy('since','asc')->get();
        $faculties = Faculties::orderBy('name', 'asc')->get();
        return view('Horario_Espacio_Fisico.create_horario_espacio_fisico')->with(['days'=>$day,'hours'=>$hours,'faculties'=>$faculties, 'period_cycles'=>$period_cycle]);
  
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
     /*   $horario= new Schedules_physicals_spaces();
        $horario->physical_space_id = $request->physical_space_id;
        $horario->hour_id = $request->hour_id;
           $horario->day_id = $request->day_id;
              $horario->observation = $request->observation;
                 $horario->state = $request->state;
                $horario->period_cycle_id = $request->period_cycle_id;
                 $horario->teacher_career_id = $request->teacher_career_id;
                 $horario->save();
            return ;
*/    }

    public function CrearHorario (Request $request){

         $horario= new Schedules_physicals_spaces();
        $horario->physical_space_id = $request->physical_space_id;
        $horario->hour_id = $request->hour_id;
           $horario->day_id = $request->day_id;
              $horario->observation = $request->observation;
                 $horario->state = $request->state;
                 $horario->reason= $request->reason;
                 $horario->user_create = Auth::user()->id;
                $horario->period_cycle_id = $request->period_cycle_id;
                 $horario->teacher_career_id = $request->teacher_career_id;
                 $horario->save();
         return $horario;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedules_physicals_spaces  $schedules_physicals_spaces
     * @return \Illuminate\Http\Response
     */
    public function show(Schedules_physicals_spaces $schedules_physicals_spaces)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedules_physicals_spaces  $schedules_physicals_spaces
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedules_physicals_spaces $schedules_physicals_spaces)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedules_physicals_spaces  $schedules_physicals_spaces
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedules_physicals_spaces $schedules_physicals_spaces)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedules_physicals_spaces  $schedules_physicals_spaces
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedules_physicals_spaces $schedules_physicals_spaces)
    {
        //
    }

     public function delete(Request $schedules_physicals_spaces)
    {
        //
                $schedules_physicals_spaces= Schedules_physicals_spaces::findOrFail($schedules_physicals_spaces->id);
        $schedules_physicals_spaces->delete();
    
  
    }

    public function getphysicals_spacesbyfaculty(Request $request){


            $physicals_spaces = Physical_spaces::orderBy('name','asc')->where('faculty_id', $request->faculties_id)->get();
           return view('select_espaciofisico')->with(['physicals_spaces'=>$physicals_spaces]);

    }
   
      
//funcion para cargar el horario del espacio fisico seleccionada
                public function verhorario (Request $request){
                 $horario_por_hora = Schedules_physicals_spaces::where('physical_space_id',$request->physical_space_id)->get();

                 if($horario_por_hora == null || count($horario_por_hora)<=0)
                    $horario_por_hora = null; 
                     $day= Days::orderBy('id','asc')->get();
                    $hours = Hours::orderBy('id','asc')->get();

               // dd($horario_por_hora);
        return view('mostrar_horario_espacio_fisico')->with(['days'=>$day,'hours'=>$hours,'horario_por_hora'=>$horario_por_hora]);

                }


       public function getcareersbyfaculty( Request $request){

            $careers = Careers::orderBy('name','asc')->where('faculty_id', $request->faculties_id)->get();
           
           return view('select_espaciofisico_carrera')->with(['careers'=> $careers]);

        }

            public function  getteachersbycareer( Request $request){

                    $carrera_docente = Teachers_Careers::where('career_id', $request->career_id)->get();
                   $docente_id = Teachers_Careers::where('career_id', $request->career_id)->pluck('teacher_id');
                    $teachers = Teachers::findOrFail($docente_id);

           return view('select_docentes')->with(['teachers'=> $teachers, 'teachers_careers'=> $carrera_docente]);

        }

    
}
