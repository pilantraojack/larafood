<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthClientController extends Controller
{
    public function auth(Request $request)
    {
        // regras de validação
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        // recupera o cliente pelo email que vem do request
        $client = Client::where('email', $request->email)->first();

        // verifica se achou o cliente, e se achou, verifica se a senha que veio do request é a senha do email
        if(!$client || !Hash::check($request->password, $client->password)) {
            return response()->json(['message' => 'Credenciais Inválidas'], 404);
        }

        // se tudo estiver correto, cria o token a partir do device name
        $token = $client->createToken($request->device_name)->plainTextToken;

        // retorna o token em json
        return response()->json(['token' => $token]);
    }

    public function me(Request $request)
    {
        $client = $request->user();

        return new ClientResource($client);
    }

    public function logout(Request $request)
    {
        $client = $request->user();

        //Revoke all client tokens...
        $client->tokens()->delete();

        return response()->json([], 204);
    }
}
