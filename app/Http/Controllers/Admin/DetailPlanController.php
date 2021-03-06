<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDetailPlan;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Support\Facades\DB;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;
        $this->middleware(['can:plans']);

    }

    public function index($urlPlan){
        $plan = $this->plan->where('url', $urlPlan)->first();
        if(!$plan){
            return redirect()->back();
        }

        $details = $plan->details()->paginate();
        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $details,
        ]);
    }

    public function create($urlPlan){
        $plan = $this->plan->where('url', $urlPlan)->first();

        // dd($urlPlan);

        if(!$plan){
            return redirect()->back();
        }



        return view('admin.pages.plans.details.create', compact('plan'));
    }

    public function store(StoreUpdateDetailPlan $request, $urlPlan){
        $plan = $this->plan->where('url', $urlPlan)->first();
        if(!$plan){
            return redirect()->back();
        }

        try{
            DB::beginTransaction();
            $plan->details()->create($request->all());

            DB::commit();
            return redirect()->route('details.plan.index', $plan->url)
                                    ->withSuccess([
                                        'titulo' => 'Detalhe inserido com sucesso !'
                                    ]);

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('details.plan.index', $plan->url)
                                    ->withErrors([
                                        'titulo' => 'Erro !'
                                    ]);
        }
    }

    public function edit($urlPlan, $idDetail) {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.edit', [
            'plan' => $plan,
            'detail' => $detail,
        ]);
    }

    public function update(StoreUpdateDetailPlan $request, $urlPlan, $idDetail) {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if(!$plan || !$detail) {
            return redirect()->back();
        }

        try{
            DB::beginTransaction();
            $detail->update($request->all());

            DB::commit();
            return redirect()->route('details.plan.index', $plan->url)
                                    ->withSuccess([
                                        'titulo' => 'Detalhe atualizado com sucesso !'
                                    ]);

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('details.plan.index', $plan->url)
                                    ->withErrors([
                                        'titulo' => 'Erro !'
                                    ]);
        }
    }

    public function show($urlPlan, $idDetail) {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.show', [
            'plan' => $plan,
            'detail' => $detail,
        ]);
    }

    public function destroy($urlPlan, $idDetail) {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if(!$plan || !$detail) {
            return redirect()->back();
        }

        $detail->delete();
        return redirect()
                    ->route('details.plan.index', $plan->url)
                    ->with('message', 'Deletado com sucesso.');

    }

}

