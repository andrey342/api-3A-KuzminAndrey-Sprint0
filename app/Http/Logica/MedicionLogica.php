<?php

namespace App\Http\Logica;

use App\Models\Medicion;
use Illuminate\Support\Str;

class MedicionLogica
{
    public function AddMedicion(Medicion $medicion){

        $newMedicion = new Medicion();
        $newMedicion->fecha = $medicion->fecha;
        $newMedicion->lectura = $medicion->lectura;
        $newMedicion->user_id = $medicion->user_id;

        $newMedicion->save();

        return response()->json($newMedicion);

    }

    public function GetAllMediciones(){
        return Medicion::All();
    }

    public function  GetMedicionesById(int $id){
        return Medicion::find($id);
    }

    /*public function DestroyAllUsers(){}*/

    public function DestroyMedicionById(int $id){
        $user = Medicion::destroy($id);
        return response()->json($user);
    }
}
