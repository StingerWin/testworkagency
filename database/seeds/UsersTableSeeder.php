<?php

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
        $user = [
            'name' => 'Admin',
            'email' => 'super@admin.admin',
            'password' => \Illuminate\Support\Facades\Hash::make('secret'),
        ];
        \App\User::updateOrCreate(['email' => $user['email']], $user);
    }
}
