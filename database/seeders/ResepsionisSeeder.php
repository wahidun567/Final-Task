<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class ResepsionisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $user = User::create([
            'name' => 'resepsionis',
            'email' => 'resepsionishotel@gmail.com',
            'password' => bcrypt('resepsionis'),
            'email_verified_at' => now(),
        ]);
 
        $user->assignRole('resepsionis');

        return $user;
    }
}
