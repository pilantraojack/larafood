<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    private $repository;

    public function __construct(Category $category)
    {
        $this->repository = $category;
        $this->middleware(['can:categories']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->repository->latest()->paginate();

        return view('admin.pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateCategory;
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategory $request)
    {
        $data = $request->all();
        $tenant = auth()->user()->tenant;
        $data['tenant_id'] = $tenant->id;

        try{
            DB::beginTransaction();
            $this->repository->create($data);

            DB::commit();
            return redirect()->route('categories.index')
                                    ->withSuccess([
                                        'titulo' => 'Categoria inserida com sucesso !'
                                    ]);

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('categories.index')
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
        if(!$category = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$category = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.categories.edit', compact('category'));

    }

    /**
     * Update register by id.
     *
     * @param  \App\Http\Requests\StoreUpdateCategory $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategory $request, $id)
    {
        if(!$category = $this->repository->find($id)){
            return redirect()->back();
        }

        $category->update($request->all());

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$category = $this->repository->find($id)){
            return redirect()->back();
        }

        $category->delete();

        return redirect()->route('categories.index');
    }

    public function search(Request $request) {
        $filters = $request->only('filter');

        $categories = $this->repository
                        ->where(function($query) use ($request) {
                            if($request->filter){
                                $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                                $query->orWhere('name', $request->filter);
                            }
                        })
                        ->latest()
                        ->paginate();

        return view('admin.pages.categories.index', compact('categories', 'filters'));
    }

    public function categories(){

    }
}
