<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{
    protected $role, $permission;

    public function __construct(Role $role, Permission $permission){
        $this->role = $role;
        $this->permission = $permission;

        $this->middleware(['can:roles']);
    }

    // Traz as permissoes de um perfil
    public function permissions($idRole){

        $role = $this->role->find($idRole);

        if(!$role){
            return redirect()->back();
        }

        $permissions = $role->permissions()->paginate();
        return view('admin.pages.roles.permissions.permissions', compact('role', 'permissions'));
    }

    // Traz os perfis de uma permissao
    public function roles($idPermission){

        if(!$permission = $this->permission->find($idPermission)){
            return redirect()->back();
        }

        $roles = $permission->roles()->paginate();
        return view('admin.pages.permissions.roles.roles', compact('permission', 'roles'));
    }

    // Traz as permissoes que ainda nao estao vinculadas ao perfil
    public function permissionsAvailable(Request $request, $idRole){

        if(!$role = $this->role->find($idRole)){
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $permissions = $role->permissionsAvailable($request->filter);
        return view('admin.pages.roles.permissions.available', compact('role', 'permissions', 'filters'));
    }

    // Vincula uma permissao ao perfil
    public function attachPermissionsRole(Request $request, $idRole){

        if(!$role = $this->role->find($idRole)){
            return redirect()->back();
        }

        if(!$request->permissions || count($request->permissions) == 0){
            return redirect()
                        ->back()
                        ->with('message', 'Escolha no mínimo uma permissão');
        }
        // dd($request->permissions);
        $role->permissions()->attach($request->permissions);
        return redirect()->route('roles.permissions', $role->id);

    }

    // Desvincula uma permissao ao perfil
    public function detachPermissionRole($idRole, $idPermission){
        $role = $this->role->find($idRole);
        $permission = $this->permission->find($idPermission);

        if(!$role || !$permission){
            return redirect()->back();
        }

        $role->permissions()->detach($permission);
        return redirect()->route('roles.permissions', $role->id);

    }

}

