<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Petugas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use App\DataTables\AdminListDataTable;

class AdminListController extends Controller
{
    public function index(Request $request)
    {
        $admin = User::with(['roles', 'petugas'])->whereHas('roles', function($query) {
                $query->where('roles.name', 'admin');
            })->get();
        // dd($admin);
        return view('admin.admin-list.index',compact('admin'));
    }

    public function create(){
        return view('admin.admin-list.create');
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
                    'name' => $request->nama_petugas,
                    'email' => $request->email,
                    'password' => Hash::make('sppku2022'),
                ]);

                $user->assignRole('admin');

                Petugas::create([
                    'user_id' => $user->id,
                    'kode_petugas' => 'PTGKU'.Str::upper(Str::random(5)),
                    'nama_petugas' => $request->nama_petugas,
                ]);
            });
            return redirect('admin/admin-list')->with('success', 'Data berhasil disimpan!');
        }
        $validate = $validator->errors()->all();
        return redirect('admin/admin-list/create')->with('gagal', $validate);
    }

    public function edit($id)
    {
        $admin = User::with(['petugas'])->findOrFail($id);
        return view('admin.admin-list.edit',compact('admin'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_petugas' => 'required',
        ]);

        if ($validator->passes()) {
            Petugas::where('user_id', $id)->update([
                'nama_petugas' => $request->nama_petugas,
            ]);
            User::where('id', $id)->update([
                'name' => $request->nama_petugas,
                'email' => $request->email,
            ]);
            return redirect('admin/admin-list')->with('success', 'Data berhasil diubah!');
        }
        $validate = $validator->errors()->all();
        return redirect('admin/admin-list/edit')->with('gagal', $validate);
    }

    public function destroy($id)
    {
        Petugas::where('user_id', $id)->delete();
        User::findOrFail($id)->delete();
        return redirect('admin/admin-list')->with('success', 'Data berhasil dihapus!');
    }
}
