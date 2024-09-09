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
            'name' => 'BoostSkill Teacher',
            'email' => 'teacher@boostskill.com',
            'password' => '123',
            'usertype' => USER_TYPE_TEACHER,
        ]);

        //
        User::factory()->create([
            'name' => 'BoostSkill Student',
            'email' => 'student@boostskill.com',
            'password' => '123',
            'usertype' => USER_TYPE_STUDENT,
        ]);
    }
}
