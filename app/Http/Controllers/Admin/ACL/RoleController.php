<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateRole;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    protected $repository;

    public function __construct(Role $role)
    {
        $this->repository = $role;

        $this->middleware(['can:roles']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $roles = $this->repository->paginate();

        return view('admin.pages.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateRole $request)
    {
        try{
            DB::beginTransaction();
            $this->repository->create($request->all());

            DB::commit();
            return redirect()->route('roles.index')
                                ->withSuccess([
                                    'titulo' => 'Cargo inserido com sucesso !'
                                ]);

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('roles.index')
                                ->withErrors([
                                    'titulo' => 'Erro !'
                                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$role = $this->repository->find($id)) {
            return redirect()->back();
        }

       return view('admin.pages.roles.show', compact('role'));
       //dd($role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if (!$role = $this->repository->find($id)) {
           return redirect()->back();
       }

       return view('admin.pages.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRole $request, $id)
    {
        if (!$role = $this->repository->find($id)) {
            return redirect()->back();
        }

        try{
            DB::beginTransaction();
            $role->update($request->all());

            DB::commit();
            return redirect()->route('roles.index')
                                ->withSuccess([
                                    'titulo' => 'Cargo atualizado com sucesso !'
                                ]);

        }catch(\Exception $e){
            return redirect()->route('roles.index')
                                ->withErrors([
                                    'titulo' => 'Erro !'
                                ]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$role = $this->repository->find($id)) {
            return redirect()->back();
        }

        $role->delete();

        return redirect()->route('roles.index');
    }

    // public function search(Request $request)
    // {
    //     $filters = $request->only('filter');

    //     $roles = $this->repository
    //                     ->where(function($query) use ($request) {
    //                         if($request->filter) {
    //                             $query->where('name', $request->filter);
    //                             $query->orWhere('description', 'LIKE', "%{$request->filter}%");
    //                         }
    //                     })
    //                     ->paginate();
    //     return view('admin.pages.roles.index', compact('roles', 'filters'));
    // }

    // função para busca, parte dela está no model
    public function search(Request $request){
        // passa a função do model para o objeto, com o $request->filter, que é o campo de busca
        $roles = $this->repository->search($request->filter);
        // retorna a lista com os resultados equivalentes à busca
        return view('admin.pages.roles.index', [
            'roles' => $roles,
        ]);
    }

}
