<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Guru A',
            'email' => 'gurua@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'guru',
        ]);
        DB::table('users')->insert([
            'name' => 'Murid A',
            'email' => 'murida@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'murid',
        ]);

        DB::table('kelas')->insert([
            'nama' => 'Kelas Guru A',
            'kode' => 'onFjfEyU',
            // 'kode' => Str::random(8),
        ]);

        DB::table('user_kelas')->insert([
            'user_id' => 1,
            'kelas_id' => 1,
            'is_owner' => 1,
        ]);
        DB::table('user_kelas')->insert([
            'user_id' => 2,
            'kelas_id' => 1,
            'is_owner' => 0,
        ]);

        DB::table('tes')->insert([
            'kelas_id' => 1,
            'nama' => 'Tes pertama',
            'durasi_jam' => 2,
            'datetime_mulai' => Carbon::create(2022, 6, 27, 10),
            'datetime_akhir' => Carbon::create(2022, 6, 27, 12),
        ]);

        DB::table('soal')->insert([
            'tes_id' => 1,
            'pertanyaan' => '5 + 5 = ...',
        ]);
        DB::table('soal')->insert([
            'tes_id' => 1,
            'pertanyaan' => '30 : 6 = ...',
        ]);

        DB::table('soal_opsi')->insert([
            'soal_id' => 1,
            'opsi' => '5',
        ]);
        DB::table('soal_opsi')->insert([
            'soal_id' => 1,
            'opsi' => '10',
        ]);
        DB::table('soal_opsi')->insert([
            'soal_id' => 1,
            'opsi' => '15',
        ]);
        DB::table('soal_opsi')->insert([
            'soal_id' => 1,
            'opsi' => '20',
        ]);
        DB::table('soal_opsi')->insert([
            'soal_id' => 1,
            'opsi' => '25',
        ]);

        DB::table('soal_opsi')->insert([
            'soal_id' => 2,
            'opsi' => '1',
        ]);
        DB::table('soal_opsi')->insert([
            'soal_id' => 2,
            'opsi' => '2',
        ]);
        DB::table('soal_opsi')->insert([
            'soal_id' => 2,
            'opsi' => '3',
        ]);
        DB::table('soal_opsi')->insert([
            'soal_id' => 2,
            'opsi' => '4',
        ]);
        DB::table('soal_opsi')->insert([
            'soal_id' => 2,
            'opsi' => '5',
        ]);
    }
}
