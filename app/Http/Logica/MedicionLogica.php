<?php

namespace App\Http\Logica;

use App\Models\Medicion;
use Illuminate\Support\Str;
use Google\Cloud\Core\Timestamp;
use DateTime;

// --------------------------------------------------------------
// MedicionLogica.php
//
// Autor: Andrey Kuzmin
// 2021-18-09
//
// --------------------------------------------------------------
//
// Respecto al contenido de esta clase, es la encargada de agregar, eliminar,
//editar los datos de la base de datos y devolver el resultado (los que sean necesarios).
// En este caso hay get y put
//

class MedicionLogica
{
    /**
     * La descripción de guardarMedicion. Funcion que declara 2 mediciones con valores manuales y
     * los inserta en la base de datos (cloud firestore) , cada medicion en su coleccion.
     *
     *
     * @return array devuelve array con las 2 mediciones que ha insertado en firebase.
     */
    public function guardarMedicion(){
        //init cloud firestore
        $db= app('firebase.firestore')->database();
        //init array
        $pepe= Array();
        //init medicion CO2
        $dataCO2 = [
            'id' => 1,
            'latX' => 13.13,
            'fecha' => new Timestamp(new DateTime()),
            'latY' => 13.13,
            'lectura' => 8888,
            'user_id' => 1,
        ];
        //agregar a la coleccion Mediciones CO2
        $db->collection('Mediciones CO2')->add($dataCO2);
        //init medicion temperatura
        $dataTemperatura = [
            'id' => 1,
            'latX' => 13.13,
            'fecha' => new Timestamp(new DateTime()),
            'latY' => 13.13,
            'lectura' => 1234,
            'user_id' => 1,
        ];
        //agregar a la coleccion Mediciones temperatura
        $db->collection('Mediciones temperatura')->add($dataTemperatura);

        $pepe[0]=$dataCO2;
        $pepe[1]=$dataTemperatura;

        return $pepe;

    }

    /**
     * La descripción de obtenerTodasLasMediciones. Funcion que hace una consulta GET a la coleccion
     * Mediciones CO2 y obtiene todos sus mediciones.
     *
     *
     * @return array devuelve array todas las mediciones.
     */
    public function obtenerTodasLasMediciones(){
        //init array
        $pepe= Array();
        //init cloud firestore
        $db= app('firebase.firestore')->database();
        //hago el query con sus restricciones
        $citiesRef = $db->collection('Mediciones CO2')->orderBy("fecha", "desc");
        //Obtengo los documentos de esa coleccion
        $documents = $citiesRef->documents();
        //contador
        $cont =0;
        //for que recorre cada documento
        foreach ($documents as $document) {
            //si existe
            if ($document->exists()) {
                //lo guardo en el array
                $pepe[$cont]=$document;
            }
            $cont++; //+1
        }
        //devolver array con mediciones
        return $pepe;
    }

    /**
     * La descripción de obtenerUltimasMediciones. Funcion que hace una consulta GET a la coleccion
     * Mediciones CO2 y obtiene la ultima medicion de CO2.
     *
     *
     * @return array devuelve la ultima medicion de CO2.
     */
    public function  obtenerUltimasMediciones(){
        //init array
        $pepe= Array();
        //init cloud firestore
        $db= app('firebase.firestore')->database();
        //hago el query con sus restricciones
        $citiesRef = $db->collection('Mediciones CO2')->orderBy("fecha", "desc")->limit(1);
        //Obtengo los documentos de esa coleccion
        $documents = $citiesRef->documents();
        //contador
        $cont =0;
        //for que recorre cada documento
        foreach ($documents as $document) {
            if ($document->exists()) {
                //lo guardo en el array
                $pepe[$cont]=$document;
            }
            $cont++;//+1
        }
        //devolver array con la ultima medicion.
        return $pepe;
    }
}
