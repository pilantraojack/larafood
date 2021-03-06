<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermission;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    protected $repository;

    public function __construct(Permission $permission)
    {
        $this->repository = $permission;
        $this->middleware(['can:permissions']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->repository->paginate();

        return view('admin.pages.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.permissions.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePermission $request)
    {
        try{
            DB::beginTransaction();
            $this->repository->create($request->all());

            DB::commit();
            return redirect()->route('permissions.index')
                                ->withSuccess([
                                    'titulo' => 'Permissão inserida com sucesso!'
                                ]);

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('permissions.index')
                            ->withErrors([
                                'titulo' => 'Erro!'
                            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$permission = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$permission = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePermission $request, $id)
    {
        if (!$permission = $this->repository->find($id)) {
            return redirect()->back();
        }

        try{
            DB::beginTransaction();
            $permission->update($request->all());

            DB::commit();
            return redirect()->route('permissions.index')
                                ->withSuccess([
                                    'titulo' => 'Permissão atualizada com sucesso!'
                                ]);

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('permissions.index')
                                ->withErrors([
                                    'titulo' => 'Erro!'
                                ]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$permission = $this->repository->find($id)) {
            return redirect()->back();
        }

        $permission->delete();

        return redirect()->route('permissions.index');
    }

    public function search(Request $request){
        $filters = $request->only('filter');

        $permissions = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->where('name', $request->filter);
                                    $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                                }
                            })
                            ->paginate();
        return view('admin.pages.permissions.index', compact(['permissions', 'filters']));
    }

}
