<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    //cria o atributo repository
    private $repository;

    //cria um construtor para injetar a dependencia do objeto
    public function __construct(Plan $plan){
        //o atributo recebe o objeto
        $this->repository = $plan;
    }

    // função que faz a listagem dos planos
    public function index(){
        // a variavel recebe o atributo, que recebe o objeto, e retorna todos os planos
        // traz todos os planos, ordena pelo mais recente, se não passar nenhum valor no paginate, o padrão é 10
        $plans = $this->repository->latest()->paginate();

        //chama a view passa a variavel para ela
        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }

    // função que retorna a view para criar um plano
    public function create(){
        // retorna a view que exibe o form
        return view('admin.pages.plans.create');
    }

    // função que salva o plano no banco, injeta o request para fazer as validações
    public function store(StoreUpdatePlan $request){

        $this->repository->create($request->all());

        return redirect()->route('plans.index');
    }

    // função que traz os detalhes do plano, recebe a url
    public function show($url){
        // passa o objeto para a variável através do repository,onde o campo url seja igual a url passada por parametro, e traz o primeiro
        $plan = $this->repository->where('url', $url)->first();
        //se não encontrar nenhum plano, redireciona de volta de onde veio o request
        if(!$plan)
            return redirect()->back();
        // se encontrar o plano,passa a variável para a view e retorna as informações do plano
        return view ('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    // função para deletar um plano
    public function destroy($url){
        // pega o plano pela url com os detalhes
        $plan = $this->repository->where('url', $url)
                                ->with('details')
                                ->first();
        // se nao achar o plano,redireciona de volta de onde veio o request
        if(!$plan)
            return redirect()->back();
        // se o plano tiver detalhes atribuídos à ele, retorna uma msg de erro
        if($plan->details->count() > 0){
            return redirect()
                        ->back()
                        ->with('error', 'Existem detalhes vinculados à esse plano');
        }
        // se tudo estiver certo, pega o plano e deleta
        $plan->delete();
        //retorna para a lista dos planos
        return redirect()->route('plans.index');

    }

    // função para busca, parte dela está no model
    public function search(Request $request){
        // passa a função do model para o objeto, com o $request->filter, que é o campo de busca
        $plans = $this->repository->search($request->filter);
        // retorna a lista com os resultados equivalentes à busca
        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }

    // função para editar o plano, recebe a url
    public function edit($url){
        $plan = $this->repository->where('url', $url)->first();
        // se nao encontrar o plano, redireciona de volta
        if (!$plan)
            return redirect()->back();
        // se achar o plano, retorna a view de edição, passando a variável
        return view('admin.pages.plans.edit', [
            'plan' => $plan
        ]);
    }

    public function update(StoreUpdatePlan $request, $url) {
        // pega o plano pela url, se ela for igual a url do parametro, pega o primeiro
        $plan = $this->repository->where('url', $url)->first();
        // se nao encontrar o plano, redireciona de volta
        if(!$plan)
            return redirect()->back();
        // se achar o plano, faz o update
        $plan->update($request->all());
        // redireciona de volta à lista
        return redirect()->route('plans.index');

    }

}
