<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('111'),
            'nip' => '111',
            'unit' => 'Perwakilan BPKP Provinsi NTB',
            'level' => '4',
            'bidang' => 'Umum'
            ]
        ]);
    }
}
