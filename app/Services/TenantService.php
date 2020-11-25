<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Models\Plan;
use App\Repositories\Contracts\TenantRepositoryInterface;

// essa classe serve para trasferir a responsabilidade do register controller
class TenantService
{
    private $plan, $data = [];
    private $repository;

    public function __construct(TenantRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllTenants(int $per_page)
    {
        return $this->repository->getAllTenants($per_page);
    }

    public function getTenantByUuid(string $uuid)
    {
        return $this->repository->getTenantByUuid($uuid);
    }

    public function make(Plan $plan, array $data){
        $this->plan = $plan;
        $this->data = $data;

        $tenant = $this->storeTenant();

        $user = $this->storeUser($tenant);

        return $user;
    }

    public function storeTenant() {
        $data = $this->data;
        // dd($this->data);

        if($data->hasFile('logo') && $data->logo->isValid()){
            $data['logo'] = $data->logo->store("tenants/{$data->uuid}/logo");
        } else {
            $data['logo'] = 'tenants/default.png';
        }

        return $this->plan->tenants()->create([
            'cnpj'  => $data['cnpj'],
            'name'  => $data['empresa'],
            'email' => $data['email'],
            'url'   => $data['logo'],
            'subscription' => now(),
            'expires_at' => now()->addDays(7),
        ]);
    }

    public function storeUser($tenant) {
        $user = $tenant->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => bcrypt($this->data['password']),
        ]);

        return $user;
    }

}
