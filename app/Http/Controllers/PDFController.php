<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Days;
use App\Hours;
use DB;

class PDFController extends Controller
{
   
public function horario_docente(Request $request){
            $days= Days::orderBy('id','asc')->get();
                    $hours = Hours::orderBy('id','asc')->get();

         $horario_docente = DB::table('schedules_physicals_spaces as A')->select('A.day_id', 'A.hour_id'
            ,'A.observation','A.reason','B.NAME', 'B.LAST_NAME','D.type AS AULA_TYPE', 'D.NAME AS AULA_NAME','D.LOCATION')->join('teachers_careers as C','c.id','=','A.teacher_career_id')->join('teachers as B','B.ID','=','C.teacher_id')->join('physical_spaces as D','D.ID','=','A.physical_space_id' )->where('A.teacher_career_id', $request->teacher_career_id_pdf)->Where('A.period_cycle_id',$request->period_cycle_id_pdf)->where('A.state','Activo')->get();
          
         $datos_docente = DB::table('teachers_careers as A')->select('B.NAME', 'B.LAST_NAME', 'B.DEGREE', 'B.IMAGE','B.PHONE')->join('teachers as B','B.ID','=','A.teacher_id')->where('A.id', $request->teacher_career_id_pdf)->where('B.state','Activo')->get();
         

           	$pdf = PDF::loadView('Reportes.reporte_horario_por_docente', compact('horario_docente','days','hours','datos_docente'));
           		$pdf->setPaper('A4','landscape');
           	
				return $pdf->download('horario_docente.pdf');

}
public function horario_espacio_fisico(Request $request){
            $days= Days::orderBy('id','asc')->get();
                    $hours = Hours::orderBy('id','asc')->get();

         $horario_docente = DB::table('schedules_physicals_spaces as A')->select('A.day_id', 'A.hour_id','A.observation','A.reason','B.NAME', 'B.LAST_NAME', 'D.NAME AS AULA_NAME','D.LOCATION', 'D.TYPE as AULA_TYPE')->join('teachers_careers as C','c.id','=','A.teacher_career_id')->join('teachers as B','B.ID','=','C.teacher_id')->join('physical_spaces as D','D.ID','=','A.physical_space_id' )->Where('A.period_cycle_id',$request->period_cycle_id_pdf)->where('A.state','Activo')->where('D.id',$request->physical_space_id_pdf)->get();
             

           	$pdf = PDF::loadView('Reportes.reporte_horario_por_espacio_fisico', compact('horario_docente','days','hours'));
           		$pdf->setPaper('A4','landscape');
           	
				return $pdf->download('horario_Espacio_fisico.pdf');

}



}
