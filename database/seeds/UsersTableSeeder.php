<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Dev',
            'email'    => 'dev@011brasil.com.br',
            'password' => bcrypt('#larafood'),
        ]);
    }
}
