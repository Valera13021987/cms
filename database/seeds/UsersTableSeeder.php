<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'valera13021987@gmail.com')->first();

        if(!$user){
            User::create([
                'name' => 'Valera Mishin',
                'email' => 'valera13201987@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('cqppclri')
            ]);
        }
    }
}