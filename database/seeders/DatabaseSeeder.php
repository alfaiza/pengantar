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
            'level' => '1',
            'bidang' => 'Umum'
            ],
            [
            'name' => 'Komang',
            'email' => 'komanga@gmail.com',
            'password' => Hash::make('222'),
            'nip' => '222',
            'unit' => 'Perwakilan BPKP Provinsi NTB',
            'level' => '2',
            'bidang' => 'Umum'
            ],
            [
            'name' => 'Yusuf',
            'email' => 'yusuf@gmail.com',
            'password' => Hash::make('333'),
            'nip' => '333',
            'unit' => 'Perwakilan BPKP Provinsi NTB',
            'level' => '3',
            'bidang' => 'APD'
            ],
            [
            'name' => 'Tia',
            'email' => 'yusuf@gmail.com',
            'password' => Hash::make('444'),
            'nip' => '444',
            'unit' => 'Perwakilan BPKP Provinsi NTB',
            'level' => '4',
            'bidang' => 'APD'
            ]
        ]);
    }
}
