<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::create([
            'tenant_id' => '1',
            'name' => 'Bebidas',
            'description' => 'Bebidas alcoólicas'
        ]);

        Category::create([
            'tenant_id' => '1',
            'name' => 'Carnes',
            'description' => 'Procedência duvidosa'
        ]);

        Category::create([
            'tenant_id' => '1',
            'name' => 'Peixes',
            'description' => 'Isso não é salmão...'
        ]);
    }
}
