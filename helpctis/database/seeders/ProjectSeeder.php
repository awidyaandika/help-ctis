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
                'centre_name' => 'Bali Med',
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
                'centre_name' => 'Prima Medica',
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
            [
                'centre_name' => 'Bali Med',
                'username' => 'officer',
                'password' => bcrypt('mangacan'),
                'name' => 'officer',
                'gender' => 'male',
                'email' => 'officer@gmail.com',
                'phone' => '085834495857',
                'address' => 'Jl. Officer No.1',
                'position' => 'officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'centre_name' => 'Bali Med',
                'username' => 'tester',
                'password' => bcrypt('mangacan'),
                'name' => 'tester',
                'gender' => 'male',
                'email' => 'tester@gmail.com',
                'phone' => '085858837465',
                'address' => 'Jl. Tester No.1',
                'position' => 'tester',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'centre_name' => 'Prima Medica',
                'username' => 'officer2',
                'password' => bcrypt('mangacan'),
                'name' => 'officer2',
                'gender' => 'male',
                'email' => 'officer2@gmail.com',
                'phone' => '085747736454',
                'address' => 'Jl. Officer No.2',
                'position' => 'officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'centre_name' => 'Prima Medica',
                'username' => 'tester2',
                'password' => bcrypt('mangacan'),
                'name' => 'tester2',
                'gender' => 'male',
                'email' => 'tester2@gmail.com',
                'phone' => '085483347563',
                'address' => 'Jl. Tester No.2',
                'position' => 'tester',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'centre_name' => 'Bali Med',
                'username' => 'patient',
                'password' => bcrypt('mangacan'),
                'name' => 'patient',
                'gender' => 'male',
                'email' => 'patient@gmail.com',
                'phone' => '085645537456',
                'address' => 'Jl. Patient No.1',
                'position' => 'patient',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'centre_name' => 'Prima Medica',
                'username' => 'patient2',
                'password' => bcrypt('mangacan'),
                'name' => 'patient2',
                'gender' => 'male',
                'email' => 'patient2@gmail.com',
                'phone' => '085746657483',
                'address' => 'Jl. Patient No.2',
                'position' => 'patient',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        DB::table('test_centres')->insert([
            [
                'centre_name' => 'Bali Med',
                'address' => 'Jl. Mahendradatta No.57 X',
                'postal_code' => '80119',
                'phone' => '0361484748',
                'city' => 'Denpasar',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'centre_name' => 'Prima Medica',
                'address' => 'Jl. Raya Sesetan No.10',
                'postal_code' => '80119',
                'phone' => '0361236225',
                'city' => 'Denpasar',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        DB::table('test_kits')->insert([
            [
                'centre_id' => '1',
                'test_name' => 'PCR',
                'stock' => '20',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'centre_id' => '2',
                'test_name' => 'Rapid',
                'stock' => '20',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
