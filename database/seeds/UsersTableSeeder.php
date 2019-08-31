<?php

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
        DB::table('users')->insert([
            'name' => 'Shiva sapra',
            'email' => 'shivasapra24@gmail.com',
            'password' => Hash::make('password'),
            'admin' => 1,
            'created_at' =>now(),
        ]);

        DB::table('users')->insert([
            'name' => 'AICBC',
            'email' => 'aicbc2019@gmail.com',
            'password' => Hash::make('2019@iiser'),
            'admin' => 1,
            'created_at' =>now(),
        ]);
    }
}
