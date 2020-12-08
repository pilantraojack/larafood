<?php

use App\Models\{
    Plan,
    Tenant
};
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
            'cnpj' => '51.702.420/0001-50',
            'name' => 'Prerigo',
            'url'  => 'prerigo',
            'email'=> 'prerigo@fodase.com',
        ]);
    }
}
