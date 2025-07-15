<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data = [
            [
                'nik' => '3506010101010001',
                'name' => 'Ayu Rahma',
                'username' => 'ayurahma',
                'email' => 'ayu@example.com',
                'telp' => '081234567001',
                'jenis_kelamin' => 'P',
                'password' => Hash::make('password'),
            ],
            [
                'nik' => '3506010202020002',
                'name' => 'Budi Santoso',
                'username' => 'budisantoso',
                'email' => 'budi@example.com',
                'telp' => '081234567002',
                'jenis_kelamin' => 'L',
                'password' => Hash::make('password'),
            ],
            [
                'nik' => '3506010303030003',
                'name' => 'Citra Dewi',
                'username' => 'citradewi',
                'email' => 'citra@example.com',
                'telp' => '081234567003',
                'jenis_kelamin' => 'P',
                'password' => Hash::make('password'),
            ],
            [
                'nik' => '3506010404040004',
                'name' => 'Doni Prasetyo',
                'username' => 'doniprasetyo',
                'email' => 'doni@example.com',
                'telp' => '081234567004',
                'jenis_kelamin' => 'L',
                'password' => Hash::make('password'),
            ],
            [
                'nik' => '3506010505050005',
                'name' => 'Eka Fitri',
                'username' => 'ekafitri',
                'email' => 'eka@example.com',
                'telp' => '081234567005',
                'jenis_kelamin' => 'P',
                'password' => Hash::make('password'),
            ],
            [
                'nik' => '3506010606060006',
                'name' => 'Fajar Hidayat',
                'username' => 'fajarhidayat',
                'email' => 'fajar@example.com',
                'telp' => '081234567006',
                'jenis_kelamin' => 'L',
                'password' => Hash::make('password'),
            ],
            [
                'nik' => '3506010707070007',
                'name' => 'Gita Permata',
                'username' => 'gitapermata',
                'email' => 'gita@example.com',
                'telp' => '081234567007',
                'jenis_kelamin' => 'P',
                'password' => Hash::make('password'),
            ],
            [
                'nik' => '3506010808080008',
                'name' => 'Hadi Wirawan',
                'username' => 'hadiwirawan',
                'email' => 'hadi@example.com',
                'telp' => '081234567008',
                'jenis_kelamin' => 'L',
                'password' => Hash::make('password'),
            ],
            [
                'nik' => '3506010909090009',
                'name' => 'Intan Melati',
                'username' => 'intanmelati',
                'email' => 'intan@example.com',
                'telp' => '081234567009',
                'jenis_kelamin' => 'P',
                'password' => Hash::make('password'),
            ],
            [
                'nik' => '3506011010100010',
                'name' => 'Joko Subroto',
                'username' => 'jokosubroto',
                'email' => 'joko@example.com',
                'telp' => '081234567010',
                'jenis_kelamin' => 'L',
                'password' => Hash::make('password'),
            ],
        ];

        DB::table('masyarakat')->insert($data);
    }
}
