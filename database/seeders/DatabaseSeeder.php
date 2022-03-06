<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Petugas;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\RolesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolesTableSeeder::class);
        $this->call(SppSeeder::class);
        



        // seed kelas
        $kelas1 = Kelas::create([
            'nama_kelas' => 'X RPL 1',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
        ]);
        $kelas2 = Kelas::create([
            'nama_kelas' => 'X RPL 2',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
        ]);
        

        // seed user
    	$user1 = User::create([
    		'name' => 'admin123',
    		'email' => 'admin@gmail.com',
    		'password' => Hash::make('password'),
    	]);
        $user1->assignRole('admin');
        // 
        $user2 = User::create([
    		'name' => 'petugas123',
    		'email' => 'petugas@gmail.com',
    		'password' => Hash::make('password'),
    	]);
        $user2->assignRole('petugas');
        // 
        $user3 = User::create([
    		'name' => 'siswa123',
    		'email' => 'siswa@gmail.com',
    		'password' => Hash::make('password'),
    	]);
        $user3->assignRole('siswa');
        // 

        // seed petugas
        Petugas::create([
            'user_id' => $user1->id,
            'kode_petugas' => 'PTG'.Str::upper(Str::random(5)),
            'nama_petugas' => 'Administrator',
            'jenis_kelamin' => 'Laki-laki',
        ]);
        Petugas::create([
            'user_id' => $user2->id,
            'kode_petugas' => 'PTG'.Str::upper(Str::random(5)),
            'nama_petugas' => 'Elaina San',
            'jenis_kelamin' => 'Perempuan',
        ]);

        Siswa::create([
            'user_id' => $user3->id,
            'kode_siswa' => 'SSW'.Str::upper(Str::random(5)),
            'nisn' => '08909978',
            'nis' => '08909955',
            'nama_siswa' => 'Diva',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Metal Float',
            'no_telepon' => '08599876098',
            'kelas_id' => $kelas1->id,
        ]);
    }
}
