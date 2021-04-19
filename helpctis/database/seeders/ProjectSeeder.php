<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'manager',
                'password' => bcrypt('mangacan'),
                'name' => 'Manager',
                'gender' => 'male',
                'email' => 'manager@gmail.com',
                'phone' => '085855539857',
                'address' => 'Jl. Manager No.1',
                'position' => 'manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'awidyaandika',
                'password' => bcrypt('mangacan'),
                'name' => 'Awidya Andika',
                'gender' => 'male',
                'email' => 'awidyaandika@gmail.com',
                'phone' => '085434456745',
                'address' => 'Jl. Aja Dulu No.1',
                'position' => 'manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
