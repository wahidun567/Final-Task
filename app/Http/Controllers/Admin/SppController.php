<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spp;
use Illuminate\Support\Facades\Validator;

class SppController extends Controller
{
    public function index(Request $request)
    {
        $spp = Spp::all();
        return view('admin.spp.index',compact('spp'));
    }
    
    public function create()
    {
        return view('admin.spp.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tahun' => ['required', 'unique:spp'],
            'nominal' => ['required', 'numeric'],
        ],[
            'tahun.unique' => 'data SPP tahun '.$request->tahun.' sudah terdaftar',
        ]);

        if ($validator->passes()) {
            Spp::create($request->all());
            return redirect('admin/spp')->with('success', 'Data berhasil disimpan!');
        }

        return redirect('admin/spp/create')->with('gagal', $validator->errors()->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spp = Spp::findOrFail($id);
        return view('admin.spp.edit',compact('spp'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nominal' => ['required', 'numeric']
        ]);

        if ($validator->passes()) {
            Spp::findOrFail($id)->update($request->all());
            return redirect('admin/spp')->with('success', 'Data berhasil diupdate!');
        }

        return redirect('admin/spp'.$id.'/edit')->with('gagal', $validator->errors()->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Spp::findOrFail($id)->delete();
        return response()->json(['message' => 'Data berhasil dihapus!']);
    }
}
