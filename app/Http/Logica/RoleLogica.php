<?php

namespace App\Http\Logica;

use App\Models\Role;
use Illuminate\Support\Str;

class RoleLogica
{
    public function AddRole(Role $role){

        $newRole = new Role();
        $newRole->name = $role->name;
        $newRole->description = $role->description;

        $newRole->save();

        return response()->json($newRole);

    }

    public function GetAllRoles(){
        return Role::All();
    }

    public function  GetRoleById(int $id){
        return Role::find($id);
    }

    public function UpdateRole(Role $role){

        $newRole = Role::findOrFail($role->id); //encontramos el user que queremos editar
        $newRole->name = $role->name;
        $newRole->description = $role->description;


        $newRole->save();

        return response()->json($newRole);

    }

    /*public function DestroyAllRoles(){}*/

    public function DestroyRolesById(int $id){
        $role = Role::destroy($id);
        return response()->json($role);
    }
}
