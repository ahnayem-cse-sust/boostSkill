<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Admin::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@iosoup.com',
            'password' => '123',
            'admintype' => 'ADMN',
        ]);

        //
        Admin::factory()->create([
            'name' => 'Manager User',
            'email' => 'manager@iosoup.com',
            'password' => '123',
            'admintype' => 'MNGR',
        ]);
    }
}
