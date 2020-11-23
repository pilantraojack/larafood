<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClient;
use App\Http\Resources\ClientResource;
use App\Services\ClientService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $clientService;

    public function __construct(ClientService $clientService)
    {

        $this->$clientService = $clientService;
        // return response()->json($clientService);
    }

    public function store(StoreClient $request)
    {
        // return response()->json($this->clientService->toArray());

        $client = $this->clientService->createNewClient($request->all());

        // return $client;
        return new ClientResource($client);
    }
}
