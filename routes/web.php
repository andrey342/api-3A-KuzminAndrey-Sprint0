<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/insert',function (){
   $stuRef= app('firebase.firestore')->database()->collection('Students')->newDocument();
   $stuRef->set([
       'name'=> 'dengue',
       'age'=>25
   ]);
});*/
