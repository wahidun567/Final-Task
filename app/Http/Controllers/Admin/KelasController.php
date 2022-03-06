<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $kelas = Kelas::all();
        return view('admin.kelas.index',compact('kelas'));
    }

    public function create(){
        return view('admin.kelas.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required|unique:kelas',
            'kompetensi_keahlian' => 'required',
        ],[
            'nama_kelas.required' => 'nama kelas tidak boleh kosong!',
            'nama_kelas.unique' => 'nama kelas sudah terdaftar!',
            'kompetensi_keahlian.required' => 'kompetensi keahlian tidak boleh kosong!',
        ]);

        if ($validator->passes()) {
            Kelas::create($request->all());

            return redirect('admin/kelas')->with('success', 'Data berhasil disimpan!');
        }
        $validate = $validator->errors()->all();
        return redirect('admin/kelas/create')->with('gagal', $validate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('admin.kelas.edit',compact('kelas'));
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
        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ],[
            'nama_kelas.required' => 'nama kelas tidak boleh kosong!',
            'kompetensi_keahlian.required' => 'kompetensi keahlian tidak boleh kosong!',
        ]);

        if ($validator->passes()) {
            Kelas::findOrFail($id)->update($request->all());

            return redirect('admin/kelas')->with('success', 'Data berhasil diubah!');
        }
        $validate = $validator->errors()->all();
        return $validate;
        return redirect('admin/kelas/'.$id.'/edit')->with([
            'gagal' => 'Data Gagal diubah!, Beberapa data sudah ada',
            'gagal2' => 'data ini sudah digunakan'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::findOrFail($id)->delete();
        return redirect('admin/kelas')->with('success', 'Data berhasil dihapus!');
    }
}
