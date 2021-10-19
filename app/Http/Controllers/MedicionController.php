<?php

namespace App\Http\Controllers;

use App\Http\Logica\MedicionLogica;
use App\Models\Medicion;
use Illuminate\Http\Request;

// --------------------------------------------------------------
// MedicionController.php
//
// Autor: Andrey Kuzmin
// 2021-18-09
//
// --------------------------------------------------------------
//
// Los controladores son los encargados de llamar a las funciones
//de la lógica correspondiente y devolver en el caso necesario los datos
//obtenidos de las funciones de la lógica para luego gestionarlos.
//

class MedicionController extends Controller
{
    //


    /**
     * La descripción de create. Funcion que crea una medicion en la collecion Medicion CO2 y medicion temperatura
     * con los datos escritos por defecto.
     *
     * @return array devuelve un array rellenado con las 2 mediciones que se han insertado en la base de datos.
     */
    public function create(){
        //init logica
        $returnMedicion = new MedicionLogica();
        //devolver array con las mediciones insertadas en la base de datos
        return $returnMedicion->guardarMedicion();
    }


    /**
     * La descripción de show. Funcion que llama al metodo de la logica que obtiene la ultima medicion CO2
     * y le pasa esa medicion a la vista home.blade.php
     *
     * devuelve un array con la ultima medicion de la coleccion CO2.
     */
    public function show(){

        $medicion = new MedicionLogica();
        //guardo el array en una variable
        $res=$medicion->obtenerUltimasMediciones();
        //devuelvo la vista home con el array como extra
        return view('home' , compact('res') );
    }

    /**
     * La descripción de showAll. Funcion que llama al metodo de la logica que obtiene todas las mediciones de CO2
     * y le pasa esas mediciones a la vista home.blade.php
     *
     * devuelve un array con las mediciones de la coleccion CO2.
     */
    public function showAll(){

        $medicion = new MedicionLogica();
        $res=$medicion->obtenerTodasLasMediciones();
        //devuelvo la vista home con el array como extra
        return view('home' , compact('res') );
    }
}
