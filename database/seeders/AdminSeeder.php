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
            'first_name' => 'BoostSkill',
            'last_name' => 'Admin',
            'email' => 'admin@boostskill.com',
            'password' => '123',
            'user_type' => ADMIN_TYPE_ADMIN,
            'is_active' => IS_ACTIVE_YES
        ]);

        //
        Admin::factory()->create([
            'first_name' => 'BoostSkill',
            'last_name' => 'Manager',
            'email' => 'manager@boostskill.com',
            'password' => '123',
            'user_type' => ADMIN_TYPE_MANAGER,
            'is_active' => IS_ACTIVE_YES
        ]);

        //
        Admin::factory()->create([
            'first_name' => 'BoostSkill',
            'last_name' => 'Accountant',
            'email' => 'accountant@boostskill.com',
            'password' => '123',
            'user_type' => ADMIN_TYPE_ACCOUNTANT,
            'is_active' => IS_ACTIVE_YES
        ]);
    }
}
