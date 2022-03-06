<?php

namespace App\Http\Controllers\Admin;

use App\Models\Spp;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index(){
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        return view('admin.siswa.index', compact('siswa', 'kelas'));
    }
    public function create(){
        $kelas = Kelas::all();
        return view('admin.siswa.create',compact('kelas'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_siswa' => 'required',
            'email' => 'required',
            'nisn' => 'required',
            'nis' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        if ($validator->passes()) {
            DB::transaction(function() use($request){
                $user = User::create([
                    'name' => $request->nama_siswa,
                    'email' => $request->email,
                    'password' => Hash::make('sppku2022'),
                ]);

                $user->assignRole('siswa');

                Siswa::create([
                    'user_id' => $user->id,
                    'kode_siswa' => 'SSWR'.Str::upper(Str::random(5)),
                    'nisn' => $request->nisn,
                    'nis' => $request->nis,
                    'nama_siswa' => $request->nama_siswa,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat' => $request->alamat,
                    'no_telepon' => $request->no_telepon,
                    'kelas_id' => $request->kelas,
                ]);
            });
            return redirect('admin/siswa')->with('success', 'Data berhasil disimpan!');   
        }else {
            return $validator->errors()->all();
            // dd($error->all()=='The email has already been taken.');
            return redirect('admin/siswa/create')->with('error', 'Data gagal disimpan, beberapa data ada yang sudah digunakan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::with(['kelas', 'spp'])->findOrFail($id);
        $kelas = Kelas::all();
        return view('admin.siswa.edit',compact('siswa','kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // if($request->all() === $request)
        $validator = Validator::make($request->all(), [
            'nama_siswa' => 'required',
            'email' => 'required',
            'nisn' => 'required',
            'nis' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);
        if ($validator->passes()) {
            Siswa::findOrFail($id)->update([
                'nisn' => $request->nisn,
                'nis' => $request->nis,
                'nama_siswa' => $request->nama_siswa,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon,
                'kelas' => $request->kelas_id,
            ]);
            User::findOrFail($id)->update([
                'name' => $request->nama_siswa,
                'email' => $request->email,
            ]);
            return redirect('admin/siswa')->with('success', 'Data berhasil diubah!');   
        }
        return redirect('admin/siswa')->with('error', 'Data gagal diubah, beberapa data ada yang sudah digunakan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        User::findOrFail($siswa->user_id)->delete();
        $siswa->delete();
        return redirect('admin/siswa')->with('success','Berhasil hapus data!');
    }
}
