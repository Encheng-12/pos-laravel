<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [[
            "id"=> 1,
            'name' => 'Student1',
            'email' => 'student16@gmail.com',
            'password' => Hash::make('123456789', ['rounds' => 12]),
            'role' => 'cashier',
            'phone_number' => '012345678'
        ],
        [
            'id'=> 2,
            'name' => 'Student2',
            'email' => 'student17@gmail.com',
            'password' => Hash::make('123456789', ['rounds' => 12]),
            'role' => 'cashier',
            'phone_number' => '012345678'

        ],
        [
            'id'=> 3,
            'name' => 'Student3',
            'email' => 'student18@gmail.com',
            'password' => Hash::make('123456789', ['rounds' => 12]),
            'role' => 'cashier',
            'phone_number' => '012345678'

        ],
        [
            'id'=> 4,
            'name' => 'Student4',
            'email' => 'student19@gmail.com',
            'password' => Hash::make('123456789', ['rounds' => 12]),
            'role' => 'cashier',
            'phone_number' => '012345678'

        ],
        [
            'id'=> 5,
            'name' => 'Student5',
            'email' => 'student20@gmail.com',
            'password' => Hash::make('123456789', ['rounds' => 12]),
            'role' => 'cashier',
            'phone_number' => '012345678'

        ],
        [
            'id'=> 6,
            'name' => 'Student6',
            'email' => 'student21@gmail.com',
            'password' => Hash::make('123456789', ['rounds' => 12]),
            'role' => 'cashier',
            'phone_number' => '012345678'

        ],
        [
            'id'=> 7,
            'name' => 'Student7',
            'email' => 'student22@gmail.com',
            'password' => Hash::make('123456789', ['rounds' => 12]),
            'role' => 'cashier',
            'phone_number' => '012345678'

        ],
        [
            'id'=> 8,
            'name' => 'Student8',
            'email' => 'student23@gmail.com',
            'password' => Hash::make('123456789', ['rounds' => 12]),
            'role' => 'cashier',
            'phone_number' => '012345678'

        ],
        [
            'id'=> 9,
            'name' => 'Student9',
            'email' => 'student24@gmail.com',
            'password' => Hash::make('123456789', ['rounds' => 12]),
            'role' => 'cashier',
            'phone_number' => '012345678'
        ],
        [
            'id'=> 10,
            'name' => 'Student10',
            'email' => 'student25@gmail.com',
            'password' => Hash::make('123456789', ['rounds' => 12]),
            'role' => 'cashier',
            'phone_number' => '012345678'
        ],
        ];

        foreach($users as $user){
            User::create([
                'id' => $user['id'],
                'name'=> $user['name'],
                'email'=> $user['email'],
                'password'=> Hash::make($user['password']),
                'role'=> $user['role'],
                'phone_number' => $user['phone_number'],
                    
            ]);
        }
    }
}
