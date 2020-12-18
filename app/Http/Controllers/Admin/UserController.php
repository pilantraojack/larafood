<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $repository;

    public function __construct(User $user)
    {
        $this->repository = $user;
        $this->middleware(['can:users']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // traz somente o próprio usuário
        // $users = $this->repository->latest()->tenantUser()->paginate();

        // traz todos os usuários
        $users = $this->repository->get();

        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUser $request)
    {
        $data = $request->all();
        $data['tenant_id'] = auth()->user()->tenant_id;
        $data['password'] = bcrypt($data['password']);

        try{
            DB::beginTransaction();
            $this->repository->create($data);

            DB::commit();
            return redirect()->route('users.index')
                                    ->withSuccess([
                                        'titulo' => 'Usuário atualizado com sucesso !'
                                    ]);

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('users.index')
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
        if (!$user = $this->repository->tenantUser()->find($id)) {
            return redirect()->back();
        }

       return view('admin.pages.users.show', compact('user'));
       //dd($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if (!$user = $this->repository->tenantUser()->find($id)) {
           return redirect()->back();
       }

       return view('admin.pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUser $request, $id)
    {
        if (!$user = $this->repository->tenantUser()->find($id)) {
            return redirect()->back();
        }

        $data = $request->only(['name', 'email']);
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        try{
            DB::beginTransaction();
            $user->update($data);

            DB::commit();
            return redirect()->route('users.index')
                                    ->withSuccess([
                                        'titulo' => 'Usuário atualizado com sucesso !'
                                    ]);

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('users.index')
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
        if (!$user = $this->repository->tenantUser()->find($id)) {
            return redirect()->back();
        }

        $user->delete();

        return redirect()->route('users.index');
    }

    public function search(Request $request) {
        $filters = $request->only('filter');

        $users = $this->repository
                        ->where(function($query) use ($request) {
                            if($request->filter){
                                $query->orWhere('name', 'LIKE', "%{$request->filter}%");
                                $query->orWhere('email', $request->filter);
                            }
                        })
                        ->latest()
                        ->tenantUser()
                        ->paginate();

        return view('admin.pages.users.index', compact('users', 'filters'));
    }
}
