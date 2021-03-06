<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Pembayaran::with(['siswa' => function($query){
            $query->with('kelas');
        }, 'petugas'])->latest()->get();
        return view('admin.pembayaran.index', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pembayaran::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Data permbayaran berhasil dihapus!',
            'status' => 'OK',
        ]);
    }
}
