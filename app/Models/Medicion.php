<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// --------------------------------------------------------------
// Medicion.php
//
// Autor: Andrey Kuzmin
// 2021-18-09
//
// --------------------------------------------------------------
//
// Modelo del POJO de medicion , en este archivo se indica que campos son los necesarios y cuales no.
class Medicion extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'lectura',
        'latX',
        'latY',
        'user_id',
    ];
}
