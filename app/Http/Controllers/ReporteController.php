<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Http\Requests\ReporteRequest;
use App\Jobs\GenerateReportExcel;
use App\Models\Report;
use Exception;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class ReporteController extends Controller
{
    public function generarReporte(ReporteRequest $request){

        try{
            $nombreFile = Str::slug($request->title).'_'.time().'.xlsx';

            GenerateReportExcel::dispatch($nombreFile,$request);//queue

            Report::create([
                'title'=>$request->title,
                'report_link'=> Storage::url('reports/'.$nombreFile)
            ]);

            return response()->json([
                'res'=>true,
                'msg'=>'Se genero el reporte correctamente '
            ],200);
        }catch(Exception $err){
            return response()->json([
                'res'=>false,
                'msg'=>'Ocurrio un error '.$err
            ],500);
        }
    }

    public function obtenerReporteXId(ReporteRequest $request){

        $reporte = Report::find($request->id);

        return response()->json([
            'res'=>true,
            'data'=>$reporte
        ],200);
    }

    public function listarReportes(){

        $reportes = Report::orderBy('id', 'DESC')->get();

        return response()->json([
            'res'=>true,
            'data'=>$reportes
        ],200);
    }
}
