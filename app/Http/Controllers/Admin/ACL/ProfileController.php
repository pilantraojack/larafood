<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Requests\StoreUpdateProfile;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    protected $repository;

    public function __construct(Profile $profile)
    {
        $this->repository = $profile;
        $this->middleware(['can:profiles']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = $this->repository->paginate();

        return view('admin.pages.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProfile $request)
    {
        try{
            DB::beginTransaction();
            $this->repository->create($request->all());

            DB::commit();
            return redirect()->route('profiles.index')
                                ->withSuccess([
                                    'titulo' => 'Perfil inserido com sucesso !'
                                ]);

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('profiles.index')
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
        if (!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

       return view('admin.pages.profiles.show', compact('profile'));
       //dd($profile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if (!$profile = $this->repository->find($id)) {
           return redirect()->back();
       }

       return view('admin.pages.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProfile $request, $id)
    {
        if (!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

        try{
            DB::beginTransaction();
            $profile->update($request->all());

            DB::commit();
            return redirect()->route('profiles.index')
                                ->withSuccess([
                                    'titulo' => 'Perfil atualizado com sucesso !'
                                ]);

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('profiles.index')
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
        if (!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

        $profile->delete();

        return redirect()->route('profiles.index');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $profiles = $this->repository
                        ->where(function($query) use ($request) {
                            if($request->filter) {
                                $query->where('name', $request->filter);
                                $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                            }
                        })
                        ->paginate();
        return view('admin.pages.profiles.index', compact('profiles', 'filters'));
    }
}
