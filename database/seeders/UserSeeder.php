<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Infrastructure\User\Persistence\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'email' => 'alex@tempmail.com',
            'active' => 1,
            'created_at' => '2020-01-19 16:08:59',
            'updated_at' => '2020-01-19 16:08:59',
        ]);

        User::create([
            'email' => 'maria@tempmail.com',
            'active' => 1,
            'created_at' => '2020-01-19 16:08:59',
            'updated_at' => '2020-01-19 16:08:59',
        ]);

        User::create([
            'email' => 'john@tempmail.com',
            'active' => 1,
            'created_at' => '2020-01-19 16:08:59',
            'updated_at' => '2020-01-19 16:08:59',
        ]);

        User::create([
            'email' => 'dominik@test.com',
            'active' => 0,
            'created_at' => '2020-01-19 16:08:59',
            'updated_at' => '2020-01-19 16:08:59',
        ]);

        User::create([
            'email' => 'andreas@yahoo.de',
            'active' => 0,
            'created_at' => '2020-01-19 16:08:59',
            'updated_at' => '2020-01-19 16:08:59',
        ]);

        User::create([
            'email' => 'Taaaaaaa@test.com',
            'active' => 1,
            'created_at' => '2020-01-19 16:08:59',
            'updated_at' => '2020-01-19 16:08:59',
        ]);

        User::create([
            'email' => 'rerere@test_mail.com',
            'active' => 1,
            'created_at' => '2020-01-19 16:08:59',
            'updated_at' => '2020-01-19 16:08:59',
        ]);
    }
}
