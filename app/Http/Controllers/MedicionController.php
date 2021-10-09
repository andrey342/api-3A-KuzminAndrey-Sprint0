<?php

namespace App\Http\Controllers;

use App\Http\Logica\MedicionLogica;
use App\Models\Medicion;
use Illuminate\Http\Request;

class MedicionController extends Controller
{
    //

    public function create(Request $request){

        $convertToMedicion = new Medicion();
        $convertToMedicion->fecha = $request->fecha;
        $convertToMedicion->lectura = $request->lectura;
        $convertToMedicion->user_id = $request->user_id;

        $returnMedicion = new MedicionLogica();
        return $returnMedicion->AddMedicion($convertToMedicion);
    }

    public function destroy(Request $request){
        $medicion = new MedicionLogica();
        return $medicion->DestroyMedicionById($request->id);
    }

    public function show(int $id){
        $medicion = new MedicionLogica();
        return $medicion->GetMedicionesById($id);
    }

    public function showAll(){
        //recucperar todos los registros de las mediciones
        $medicion = new MedicionLogica();
        return $medicion->GetAllMediciones();
    }
}
