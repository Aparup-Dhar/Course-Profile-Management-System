<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'id' => '12345678',
            'name' => 'Root Admin',
            'email' => 'rootadmin@gmail.com',
            'password' => md5('pass123'),
            'phone' => '01855911196',
            'department' => 'all',
            'role' => 'root',
            'status' => '1',
        ]);
    }
}
