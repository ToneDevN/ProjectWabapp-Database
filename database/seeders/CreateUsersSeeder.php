<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'userName' => 'User',
                'userEmail' => 'User@user.com',
                'type' => '0',
                'password' => bcrypt('1234'),
                'phonenumber' => '123456789'
            ],
            [
                'userName' => 'poser',
                'userEmail' => 'poser@poser.com',
                'type' => '1',
                'password' => bcrypt('1234'),
                'phonenumber' => '1234567890'
            ],
            [
                'userName' => 'admin',
                'UserEmail' => 'admin@admin.com',
                'password' => bcrypt('123456'),
                'type' => '2',
                'phonenumber' => '1234567891'
            ],

        ];

        foreach($user as $key => $value) {
            User::create($value);
        }
    }
}
