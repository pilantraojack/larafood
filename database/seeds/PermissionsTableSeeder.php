<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'tenants',
            'description' => 'Acesso à tenants',
        ]);

        Permission::create([
            'name' => 'plans',
            'description' => 'Acesso à plans',
        ]);

        Permission::create([
            'name' => 'profiles',
            'description' => 'Acesso à profiles',
        ]);

        Permission::create([
            'name' => 'roles',
            'description' => 'Acesso à roles',
        ]);

        Permission::create([
            'name' => 'permissions',
            'description' => 'Acesso à permissions',
        ]);

        Permission::create([
            'name' => 'users',
            'description' => 'Acesso à users',
        ]);

        Permission::create([
            'name' => 'categories',
            'description' => 'Acesso à categories',
        ]);

        Permission::create([
            'name' => 'products',
            'description' => 'Acesso à products',
        ]);

        Permission::create([
            'name' => 'tables',
            'description' => 'Acesso à tables',
        ]);
    }
}
