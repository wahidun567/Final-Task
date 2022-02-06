<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $user = User::create([
            'name' => 'admin',
            'email' => 'adminhotel@gmail.com',
            'password' => bcrypt('admin'),
            'email_verified_at' => now(),
        ]);
 
        $user->assignRole('admin');

        return $user;

    }
}
