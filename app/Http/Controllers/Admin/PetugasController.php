<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{
    public function index(Request $request)
    {
		$data = Petugas::all();
        return view('admin.petugas.index',compact('data'));
    }

    public function create(){
        return view('admin.petugas.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'nama_petugas' => 'required',
        ]);

        if ($validator->passes()) {
            DB::transaction(function() use($request){
                $user = User::create([
                    'name' => Str::lower($request->nama_petugas),
                    'email' => Str::lower($request->email),
                    'password' => Hash::make('sppku2022'),
                ]);
                $user->assignRole('petugas');

                Petugas::create([
                    'user_id' => $user->id,
                    'kode_petugas' => 'PTG'.Str::upper(Str::random(5)),
                    'nama_petugas' => $request->nama_petugas,
                    'jenis_kelamin' => $request->jenis_kelamin,
                ]);
            });

            return redirect('admin/petugas')->with('success', 'Data berhasil disimpan!');   
        }

        return redirect('admin/petugas')->with('gagal', $validator->errors()->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('admin.petugas.edit',compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'nama_petugas' => 'required',
            'jenis_kelamin' => 'required'
        ],[
            'jenis_kelamin.required' => 'Jenis kelamin harap dipilih!'
        ]);
        if ($validator->passes()) {
            Petugas::findOrFail($id)->update($request->all());   
            return redirect('admin/petugas')->with('success', 'Data berhasil diupdate!');
        }
        return redirect('admin/petugas/'.$id.'/edit')->with('gagal', $validator->errors()->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){

    }


    public function destroy($id)
    {
        DB::transaction(function() use($id){
            $petugas = Petugas::findOrFail($id);
            User::findOrFail($petugas->user_id)->delete();
            $petugas->delete();
        });

        return response()->json(['message' => 'Data berhasil dihapus!']);
    }
}
