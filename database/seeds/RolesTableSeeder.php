<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'description' => 'Permissões de admin'
        ]);

        Role::create([
            'name' => 'Dev',
            'description' => 'Todas as permissões'
        ]);

        Role::create([
            'name' => 'User',
            'description' => 'Permissões de pedidos'
        ]);

    }
}
