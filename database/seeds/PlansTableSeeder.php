<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Developer Mode',
            'url' => 'developer mode',
            'price' => 666.00,
            'description' => 'Plano Developer',
        ]);

    }
}
