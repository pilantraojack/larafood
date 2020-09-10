<?php

use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '321321232132',
            'name' => 'Prerigo',
            'url'  => 'prerigo',
            'email'=> 'prerigo@fodase.com',
        ]);
    }
}
