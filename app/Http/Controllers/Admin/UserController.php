<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::all();
        return view('admin.user.index', compact('data'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required','min:8',
        ],[
            'name.required' => 'nama kelas tidak boleh kosong!',
            'email.unique' => 'email sudah terdaftar!',
            'password' => 'password minimal 8 karakter',
        ]);

        if ($validator->passes()) {
            $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
            ]);
            $user->assignRole($request->role);
            return redirect('admin/user')->with('success', 'Data berhasil disimpan!');
        }
        $validate = $validator->errors()->all();
        return redirect('admin/user/create')->with('gagal', $validate);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin/user/edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        User::findOrFail($id)->update([
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $request->old_password
        ]);
        return redirect('admin/user')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('admin/user')->with('success', 'Data berhasil dihapus!');
    }
}
