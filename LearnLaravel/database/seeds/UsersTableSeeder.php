<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
                'username' => 'Arthur',
                'email' => 'arthurmargarian1997@gmail.com',
                'first_name' => 'Arthur',
                'last_name' => 'Margarian',
                'age' => '21',
                'is_admin' => true,
                'email_verified_at'=>now(), // just skip one step :)
                'password' => Hash::make('asdasd'),
            ]
        );
    }
}
