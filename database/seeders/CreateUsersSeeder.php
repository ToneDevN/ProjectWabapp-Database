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
                'name' => 'poser',
                'email' => 'poser@poser.com',
                'is_poser' => '1',
                'password' => bcrypt('1234')
            ],
            [
                'name' => 'User',
                'email' => 'User@user.com',
                'is_poser' => '0',
                'password' => bcrypt('1234')
            ],

        ];

        foreach($user as $key => $value) {
            User::create($value);
        }
    }
}
