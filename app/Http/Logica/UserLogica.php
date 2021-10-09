<?php

namespace App\Http\Logica;
use App\Models\User;
use Illuminate\Support\Str;

//usar el modelo de la clase correspondiente

class UserLogica
{
    public function AddUser(User $user){

        $user->save();
        return response()->json($user);

    }

    public function GetAllUsers(){
        return User::All();
    }

    public function  GetUserById(int $id){
        return User::find($id);
    }

    public function UpdateUser(User $user){

        $newUser = User::findOrFail($user->id); //encontramos el user que queremos editar
        $newUser->name = $user->name;
        $newUser->slug = Str::slug($user->name, '-');
        $newUser->email = $user->email;
        $newUser->email_verified_at = $user->email_verified_at;
        $newUser->password = $user->password;
        $newUser->rol_id = $user->rol_id;

        $newUser->save();

        return response()->json($newUser);

    }

    /*public function DestroyAllUsers(){}*/

    public function DestroyUserById(int $id){
        $user = User::destroy($id);
        return response()->json($user);
    }
}
