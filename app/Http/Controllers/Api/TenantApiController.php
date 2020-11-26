<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TenantResource;
use App\Services\TenantService;

class TenantApiController extends Controller
{
    protected $tenantService;

    public function __construct(TenantService $tenantService)
    {
        $this->tenantService = $tenantService;
    }

    public function index()
    {
        return TenantResource::collection($this->tenantService->getAllTenants());
    }

    public function show($uuid)
    {
        if(!$tenant = $this->tenantService->getTenantByUuid($uuid)){
            return response()->json(['message' => 'Not Found'], 404);
        }

        return new TenantResource($tenant);
    }
}
