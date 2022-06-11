<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Http\Requests\ReporteRequest;
use App\Models\Report;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class ReporteController extends Controller
{
    public function generarReporte(ReporteRequest $request){

        try{
            $nombreFile = Str::slug($request->title).'_'.time().'.xlsx';
            $url = Storage::url('reports/'.$nombreFile);

            Excel::store(new UsersExport($request->start,$request->end),'reports/'.$nombreFile);

            Report::create([
                'title'=>$request->title,
                'report_link'=>$url
            ]);

            return response()->json([
                'res'=>true,
                'msg'=>'se genero el reporte correctamente '
            ],200);
        }catch(Exception $err){
            return response()->json([
                'res'=>false,
                'msg'=>'Ocurrio un error '.$err
            ],500);
        }
    }

    public function obtenerReporteXId(){

    }

    public function listarReportes(){

    }
}
