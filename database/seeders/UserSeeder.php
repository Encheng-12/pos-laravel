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
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => '123456789', 
            'role' => 'cashier',
            'phone_number' => '0123456789',
            'status' => 'active'

        ],
        [
            'id'=> 2,
            'name' => 'Sarah Connor',
            'email' => 'sarah.c@example.com',
            'password' => '123456789',
            'role' => 'cashier',
            'phone_number' => '0123456789',
            'status'=> 'active'
            
        ],
        [
            'id'=> 3,
            'name' => 'Michael Smith',
            'email' => 'm.smith@example.com',
            'password' => '123456789',
            'role' => 'cashier',
            'phone_number' => '0123456789',
            'status'=> 'active'

        ],
        [
            'id'=> 4,
            'name' => 'Emily Watson',
            'email' => 'emily.watson@example.com',
            'password' => '123456789',
            'role' => 'cashier',
            'phone_number' => '0123456789',
            'status'=> 'active'

        ],
        [
            'id'=> 5,
            'name' => 'David Miller',
            'email' => 'd.miller@example.com',
            'password' => '123456789',
            'role' => 'cashier',
            'phone_number' => '0123456789',
            'status'=> 'active'

            ],
        [
            'id'=> 6,
            'name' => 'Jessica Taylor',
            'email' => 'jess.taylor@example.com',
            'password' => '123456789',
            'role' => 'cashier',
            'phone_number' => '0123456789',
            'status'=> 'active'

        ],
        [
            'id'=> 7,
            'name' => 'James Wilson',
            'email' => 'j.wilson@example.com',
            'password' => '123456789',
            'role' => 'cashier',
            'phone_number' => '0123456789',
            'status'=> 'active'

        ],
        [
            'id'=> 8,
            'name' => 'Amanda White',
            'email' => 'a.white@example.com',
            'password' => '123456789',
            'role' => 'cashier',
            'phone_number' => '0123456789',
            'status'=> 'active'

        ],
        [
            'id'=> 9,
            'name' => 'Robert Johnson',
            'email' => 'robert.j@example.com',
            'password' => '123456789',
            'role' => 'cashier',
            'phone_number' => '0123456789',
            'status'=> 'active'

        ],
        [
            'id'=> 10,
            'name' => 'Lisa Anderson',
            'email' => 'lisa.a@example.com',
            'password' => '123456789',
            'role' => 'cashier',
            'phone_number' => '0123456789',
            'status'=> 'active'
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
                'status'=> $user['status'],
                    
            ]);
        }
    }
}
