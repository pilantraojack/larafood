<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    protected $user, $role;

    public function __construct(User $user, Role $role){
        $this->user = $user;
        $this->role = $role;

        $this->middleware(['can:users']);
    }

    // Traz as permissoes de um perfil
    public function roles($idUser){

        $user = $this->user->find($idUser);

        if(!$user){
            return redirect()->back();
        }

        $roles = $user->roles()->paginate();
        return view('admin.pages.users.roles.roles', compact('user', 'roles'));
    }

    // Traz os perfis de uma permissao
    public function users($idRole){

        if(!$role = $this->role->find($idRole)){
            return redirect()->back();
        }

        $users = $role->users()->paginate();
        return view('admin.pages.roles.users.users', compact('role', 'users'));
    }

    // Traz as permissoes que ainda nao estao vinculadas ao perfil
    public function rolesAvailable(Request $request, $idUser){

        if(!$user = $this->user->find($idUser)){
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $roles = $user->rolesAvailable($request->filter);
        return view('admin.pages.users.roles.available', compact('user', 'roles', 'filters'));
    }

    // Vincula uma permissao ao perfil
    public function attachRolesUser(Request $request, $idUser){

        if(!$user = $this->user->find($idUser)){
            return redirect()->back();
        }

        if(!$request->roles || count($request->roles) == 0){
            return redirect()
                        ->back()
                        ->with('message', 'Escolha no mínimo uma permissão');
        }
        // dd($request->roles);
        $user->roles()->attach($request->roles);
        return redirect()->route('users.roles', $user->id);

    }

    // Desvincula uma permissao ao perfil
    public function detachRolesUser($idUser, $idRole){
        $user = $this->user->find($idUser);
        $role = $this->role->find($idRole);

        if(!$user || !$role){
            return redirect()->back();
        }

        $user->roles()->detach($role);
        return redirect()->route('users.roles', $user->id);

    }

}

