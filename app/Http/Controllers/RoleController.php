<?php

namespace App\Http\Controllers;

use App\Http\Logica\RoleLogica;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //

    public function create(Request $request){

        $convertToRole = new Role();
        $convertToRole->name = $request->name;
        $convertToRole->description = $request->description;

        $returnRole = new RoleLogica();
        return $returnRole->AddRole($convertToRole);
    }

    public function edit(Request $request){
        //en el objeto request esta todos los inputs (ids) del formulario
        //validar si esta vacio o ni
        $request->validate([
            'name' => 'required|max:20',
            'description' => 'min:150',
        ]);

        $convertToRole = new Role();
        $convertToRole->name = $request->name;
        $convertToRole->description = $request->description;


        $returnRole = new RoleLogica();
        return $returnRole->UpdateRole($convertToRole);
    }

    public function destroy(Request $request){
        $role = new RoleLogica();
        return $role->DestroyRolesById($request->id);
    }

    public function show(int $id){
        $role = new RoleLogica();
        return $role->GetRoleById($id);
    }

    public function showAll(){
        //recucperar todos los registros de los roles
        $roles = new RoleLogica();
        return $roles->GetAllRoles();
    }

}
