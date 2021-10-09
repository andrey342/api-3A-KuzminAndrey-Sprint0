<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Logica\UserLogica;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //

    public function create(Request $request){

        $convertToUser = new User();
        $convertToUser->name = $request->name;
        $convertToUser->slug = Str::slug($request->name, '-');
        $convertToUser->email = $request->email;
        $convertToUser->email_verified_at = $request->email_verified_at;
        $convertToUser->password = $request->password;
        $convertToUser->rol_id = $request->rol_id;

        $returnUser = new UserLogica();
        return $returnUser->AddUser($convertToUser);
    }

    public function edit(Request $request){
        //en el objeto request esta todos los inputs (ids) del formulario
        //validar si esta vacio o ni
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required',
            'password' => 'required',
            'rol_id' => 'required'
        ]);

        $convertToUser = new User();
        $convertToUser->name = $request->name;
        $convertToUser->slug = Str::slug($request->name, '-');
        $convertToUser->email = $request->email;
        $convertToUser->email_verified_at = $request->email_verified_at;
        $convertToUser->password = $request->password;
        $convertToUser->rol_id = $request->rol_id;

        $user = new UserLogica();
        return $user->UpdateUser($convertToUser);
    }

    public function destroy(Request $request){
        $user = new UserLogica();
        return $user->DestroyUserById($request->id);
    }

    public function show(int $id){
        $user = new UserLogica();
        return $user->GetUserById($id);
    }

    public function showAll(){
        //recucperar todos los registros de los usarios
        $users = new UserLogica();
        return $users->GetAllUsers();
    }

}
