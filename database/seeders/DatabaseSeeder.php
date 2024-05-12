<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nama_role' => 'user'
        ]);
        DB::table('roles')->insert([
            'nama_role' => 'admin'
        ]);
        DB::table('roles')->insert([
            'nama_role' => 'pengajar'
        ]);

        DB::table('users')->insert([
            'nama' => 'asisul',
            'email' => 'asisul@gmail.com',
            'password' => bcrypt('asisul12345'),
            'role_id' => 3
        ]);

        DB::table('users')->insert([
            'nama' => 'alif',
            'email' => 'alif@gmail.com',
            'password' => bcrypt('alif123'),
            'role_id' => 1
        ]);

        DB::table('users')->insert([
            'nama' => 'hasrif',
            'email' => 'hasrif@gmail.com',
            'password' => bcrypt('hasrif123'),
            'role_id' => 2
        ]);

        DB::table('users')->insert([
            'nama' => 'novita',
            'email' => 'novita@gmail.com',
            'password' => bcrypt('novita123'),
            'role_id' => 2
        ]);

        DB::table('users')->insert([
            'nama' => 'imran',
            'email' => 'imran@gmail.com',
            'password' => bcrypt('imran123'),
            'role_id' => 2
        ]);

        DB::table('users')->insert([
            'nama' => 'husaein',
            'email' => 'husein@gmail.com',
            'password' => bcrypt('husein123'),
            'role_id' => 2
        ]);

        DB::table('users')->insert([
            'nama' => 'amirah',
            'email' => 'amirah@gmail.com',
            'password' => bcrypt('amirah123'),
            'role_id' => 2
        ]);

        DB::table('materi')->insert([
            'judul' => 'ganrang123',
            'kategori' => 'Bahasa Inggris',
            'deskripsi' => 'amirah xxx',
            'konten' => 'amirah sedang bermain bersamna pak husein di ruang dosen',
            'user_id' => 6
        ]);

     
    }
}
