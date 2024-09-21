<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::factory()->create([
            'first_name' => 'BoostSkill',
            'last_name' => 'Teacher',
            'email' => 'teacher@boostskill.com',
            'password' => '123',
            'user_type' => USER_TYPE_TEACHER,
            'is_active' => IS_ACTIVE_YES
        ]);

        //
        User::factory()->create([
            'first_name' => 'BoostSkill',
            'last_name' => 'Student',
            'email' => 'student@boostskill.com',
            'password' => '123',
            'user_type' => USER_TYPE_STUDENT,
            'is_active' => IS_ACTIVE_YES
        ]);
    }
}
