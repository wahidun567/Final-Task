<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Petugas;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa_laki_laki = Siswa::where('jenis_kelamin', 'Laki-laki')->count();
        $siswa_perempuan = Siswa::where('jenis_kelamin', 'Perempuan')->count();

    	return view('admin.dashboard', [
    		'total_siswa' => Siswa::count(),
    		'total_kelas' => Kelas::count(),
    		'total_admin' => DB::table('model_has_roles')->where('role_id', 1)->count(),
    		'total_petugas' => Petugas::count(),
            'siswa_laki_laki' => $siswa_laki_laki,
            'siswa_perempuan' => $siswa_perempuan,
    	]);
    }
}
