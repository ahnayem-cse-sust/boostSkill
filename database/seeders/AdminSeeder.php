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
            'email' => 'admin@boostskill.com',
            'password' => '123',
            'admintype' => ADMIN_TYPE_ADMIN,
        ]);

        //
        Admin::factory()->create([
            'name' => 'BoostSkill Manager',
            'email' => 'manager@boostskill.com',
            'password' => '123',
            'admintype' => ADMIN_TYPE_MANAGER,
        ]);

        //
        Admin::factory()->create([
            'name' => 'BoostSkill Accountant',
            'email' => 'accountant@boostskill.com',
            'password' => '123',
            'admintype' => ADMIN_TYPE_ACCOUNTANT,
        ]);
    }
}
