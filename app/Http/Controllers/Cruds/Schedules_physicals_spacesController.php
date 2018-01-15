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
use DB;
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
          }

    public function CrearHorario (Request $request){


            $valida_registro = Schedules_physicals_spaces::where('hour_id',$request->hour_id)->where('day_id',$request->day_id)->where('teacher_career_id', $request->teacher_career_id)->where('period_cycle_id', $request->period_cycle_id)->get();
            if(count($valida_registro)>0 ){
            return 'El docente tiene asignado este horario en otro espacio físico';
          }
            else{
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


//metodos ajax

     public function delete(Request $schedules_physicals_spaces)
    {
        //
                $schedules_physicals_spaces= Schedules_physicals_spaces::findOrFail($schedules_physicals_spaces->id);
        $schedules_physicals_spaces->delete();
    
  
    }

    public function getphysicals_spacesbyfaculty(Request $request){


            $physicals_spaces = Physical_spaces::orderBy('name','asc')->where('faculty_id', $request->faculties_id)->get();

           $description= 'Seleccione el espacio físico para asignar el horario:';
           return view('select_espaciofisico')->with(['physicals_spaces'=>$physicals_spaces, 'description'=>$description]);
    }
   
   public function getphysicals_spacesbyfaculty_consult(Request $request){

        $physicals_spaces = DB::table('Physical_spaces as A')->select('A.name','A.id','A.location')->join('Schedules_physicals_spaces as B','B.physical_space_id','=','A.ID')->where('A.faculty_id', $request->faculties_id)->distinct()->get();

           $description= 'Seleccione el espacio físico:';
           return view('select_espaciofisico')->with(['physicals_spaces'=>$physicals_spaces, 'description'=>$description]);
    }
      
//funcion para cargar el horario del espacio fisico seleccionada
                public function verhorario (Request $request){
                 $horario_por_hora = Schedules_physicals_spaces::where('physical_space_id',$request->physical_space_id)->where('period_cycle_id',$request->period_cycle_id)->get();
              /*   $horario_ = Schedules_physicals_spaces::where('physical_space_id',$request->physical_space_id)->pluck('teacher_career_id'); */
               /*
                $docente = DB::table('teachers')->select('teachers.name', 'teachers.last_name', 'teachers_careers.id')->join('teachers_careers','teacher_id','=','teachers.id')->
                    join('schedules_physicals_spaces','teacher_career_id','=','teachers_careers.id')->where('schedules_physicals_spaces.physical_space_id' ,$request->physical_space_id)->get();
                ;*/
               
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

                   $object = DB::table('TEACHERS_CAREERS as A')->select('A.ID','B.NAME', 'B.LAST_NAME')->join('TEACHERS as B','B.ID','=','A.TEACHER_ID')->where('A.career_id', $request->career_id)->orWhere('A.id',$request->teacher_career_id)->get();
            
        

           return view('select_docentes')->with(['teachers'=> $object/*, 'teachers_careers'=> $carrera_docente*/]);

        }

        public function update_schedule( Request $request){

            $schedule = Schedules_physicals_spaces::findOrFail($request->id);
                if($schedule != null || count($schedule)>0  ){
            $schedule->teacher_career_id = $request->teacher_career_id;
            $schedule->observation = $request->observation;
            $schedule->state= $request->state;
            $schedule->reason = $request->reason;

            $schedule->save();
                }

                    }

    


        //metodos para consultas
    public function Consultar_Horario_docente(Request $request){
  $period_cycle = Period_cycles::where('state','Activo')->get();
               $day= Days::orderBy('id','asc')->get();
        $hours = Hours::orderBy('since','asc')->get();
        $faculties = Faculties::orderBy('name', 'asc')->get();
        
  
        return view('Consultas.consultar_horario_docente')->with(['days'=>$day,'hours'=>$hours,'faculties'=>$faculties, 'period_cycles'=>$period_cycle]);

    }

     public function Consultar_Carreras( Request $request){

            $careers = Careers::orderBy('name','asc')->where('faculty_id', $request->faculties_id)->get();
           
           return view('consultar_carreras')->with(['careers'=> $careers]);

        }


        public function Consultar_horario_por_docente(Request $request){
                     $days= Days::orderBy('id','asc')->get();
                    $hours = Hours::orderBy('id','asc')->get();

         $horario_docente = DB::table('schedules_physicals_spaces as A')->select('A.day_id', 'A.hour_id'
            ,'A.observation','A.reason','B.NAME', 'B.LAST_NAME', 'D.NAME AS AULA_NAME','D.LOCATION')->join('teachers_careers as C','c.id','=','A.teacher_career_id')->join('teachers as B','B.ID','=','C.teacher_id')->join('physical_spaces as D','D.ID','=','A.physical_space_id' )->where('A.teacher_career_id', $request->teacher_career_id)->Where('A.period_cycle_id',$request->period_cycle_id)->where('A.state','Activo')->get();
          
         $datos_docente = DB::table('teachers_careers as A')->select('B.NAME', 'B.LAST_NAME', 'B.DEGREE', 'B.IMAGE','B.PHONE')->join('teachers as B','B.ID','=','A.teacher_id')->where('A.id', $request->teacher_career_id)->where('B.state','Activo')->get();
         
            return view('Consultar_horario_por_docente')->with(['horario_docente'=>$horario_docente,'days'=>$days,'hours'=>$hours, 'datos_docente'=>$datos_docente]);
        }


          public function Consultar_Horario_espacio_fisico(Request $request){
  $period_cycle = Period_cycles::where('state','Activo')->get();
               $day= Days::orderBy('id','asc')->get();
        $hours = Hours::orderBy('since','asc')->get();
        $faculties = Faculties::orderBy('name', 'asc')->get();
        
  
        return view('Consultas.consultar_horario_espacio_fisico')->with(['days'=>$day,'hours'=>$hours,'faculties'=>$faculties, 'period_cycles'=>$period_cycle]);

    }



         public function Consultar_horario_por_espacio_fisico(Request $request){
                     $days= Days::orderBy('id','asc')->get();
                    $hours = Hours::orderBy('id','asc')->get();

         $horario_docente = DB::table('schedules_physicals_spaces as A')->select('A.day_id', 'A.hour_id','A.observation','A.reason','B.NAME', 'B.LAST_NAME', 'D.NAME AS AULA_NAME','D.LOCATION')->join('teachers_careers as C','c.id','=','A.teacher_career_id')->join('teachers as B','B.ID','=','C.teacher_id')->join('physical_spaces as D','D.ID','=','A.physical_space_id' )->Where('A.period_cycle_id',$request->period_cycle_id)->where('A.state','Activo')->where('D.id',$request->physical_space_id)->get();
                

            return view('Consultar_horario_por_espacio_fisico')->with(['horario_docente'=>$horario_docente,'days'=>$days,'hours'=>$hours]);
        }

}

