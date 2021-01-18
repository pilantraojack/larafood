<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        $plans = Plan::with('details')->orderBy('price', 'ASC')->get();

        return view('site.pages.home.index', compact('plans'));
    }

    public function plan($url){
        // recupera o plano pela url
        $plan = PLan::where('url', $url)->first();

        // se nao encontrar redireciona de volta
        if (!$plan = Plan::where('url', $url)->first()) {
            return redirect()->back();
        }
        // se encontrar, cria uma sessão com o plano
        session()->put('plan', $plan);
        // redireciona para a rota de cadastro
        return redirect()->route('register');
    }
}
