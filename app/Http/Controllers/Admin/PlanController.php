<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{

    private $repository;

    public function construct(Plan $plan){
        $this->repository = $plan;
    }

    public function index(){
        // $plans = $this->repository->latest()->paginate(5);
        $plans = Plan::latest()->paginate(5);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }

    public function create(){

        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdatePlan $request){


        // $this->repository->create($data);
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        PLan::create($request->all());
        // dd($request->all());

        return redirect()->route('plans.index');
    }

    public function show($url){

        // $plan = $this->repository->where('url', $url)->first();
        $plan = Plan::where('url', $url)->first();

        if(!$plan)
            return redirect()->back();

        return view ('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    public function destroy($url){

        // $plan = $this->repository->where('url', $url)->first();
        $plan = Plan::where('url', $url)->first();

        if(!$plan)
            return redirect()->back();

        $plan->delete();

        return redirect()->route('plans.index');

    }

    public function search(Request $request) {

        // $filters = $request->except('_token');
        // // $plans = $this->repository->search($request->filter);
        // $plans = Plan::search($request->filters);
        // dd($plans);

        // return view('plans.index', [
        //     'plans' => $plans,
        //     'filters' => $filters,
        // ]);
    }

    public function edit($url){
        $plan = PLan::where('url', $url)->first();

        if (!$plan)
            return redirect()->back();
        return view('admin.pages.plans.edit', [
            'plan' => $plan
        ]);
    }

    public function update(StoreUpdatePlan $request, $url) {
        $plan = Plan::where('url', $url)->first();

        if(!$plan)
            return redirect()->back();

        $plan->update($request->all());

        return redirect()->route('plans.index');

    }


}
