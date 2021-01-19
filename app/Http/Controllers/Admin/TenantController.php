<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTenant;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    private $repository;

    public function __construct(Tenant $tenant)
    {
        $this->repository = $tenant;
        $this->middleware(['can:tenants']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = $this->repository->latest()->paginate();

        return view('admin.pages.tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateTenant;
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateTenant $request)
    {
        $data = $request->all();
        // dd($data);

        $tenant = auth()->user()->tenant;
        $data['tenant_id'] = $tenant->id;
        $data['plan_id'] = $tenant->plan_id;
        $data['url'] = $tenant->url;

        try{
            DB::beginTransaction();
            if($request->hasFile('logo') && $request->logo->isValid()){
                $data['logo'] = $request->logo->store("tenants/{$tenant->uuid}");
            } else {
                $data['logo'] = 'tenants/default.png';
            }

            $this->repository->create($data);

            DB::commit();
            return redirect()->route('tenants.index', compact('tenant'))
                                    ->withSuccess([
                                        'titulo' => 'Empresa cadastrada com sucesso !'
                                    ]);

        }catch(\Exception $e){
            dd($e);
            DB::rollback();
            return redirect()->route('tenants.index', compact('tenant'))
                                    ->withErrors([
                                        'titulo' => 'Error !'
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
        if(!$tenant = $this->repository->with('plan')->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.tenants.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$tenant = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.tenants.edit', compact('tenant'));

    }

    /**
     * Update register by id.
     *
     * @param  \App\Http\Requests\StoreUpdateTenant $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateTenant $request, $id)
    {
        if(!$tenant = $this->repository->find($id)){
            return redirect()->back();
        }
        // dd($tenant);

        $data = $request->all();
        $tenant = auth()->user()->tenant;
        $data['tenant_id'] = $tenant->id;
        $data['plan_id'] = $tenant->plan_id;

        try{
            DB::beginTransaction();
            if($request->hasFile('logo') && $request->logo->isValid()){
                if(Storage::exists($tenant->logo)){
                    Storage::delete($tenant->logo);
                }

                $data['logo'] = $request->logo->store("tenants/{$tenant->uuid}tenants");

            }
            // return $data;
            $tenant->update($data);

            DB::commit();
            return redirect()->route('tenants.index')
                                    ->WithSuccess([
                                        'titulo' => 'Empresa atualizada com sucesso !'
                                    ]);

        }catch(\Exception $e){
            DB::rollback();
            Log::alert('deu merda', ["merda" => $e->getMessage()]);
            return redirect()->route('tenants.index')
                                    ->WithErrors([
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
        if(!$tenant = $this->repository->find($id)){
            return redirect()->back();
        }

        if(Storage::exists($tenant->logo)){
            Storage::delete($tenant->logo);
        }

        $tenant->delete();

        return redirect()->route('tenants.index');
    }

    public function search(Request $request) {
        $filters = $request->only('filter');

        $tenants = $this->repository
                        ->where(function($query) use ($request) {
                            if($request->filter){
                                $query->where('name', $request->filter);
                            }
                        })
                        ->latest()
                        ->paginate();

        return view('admin.pages.tenants.index', compact('tenants', 'filters'));
    }
}
