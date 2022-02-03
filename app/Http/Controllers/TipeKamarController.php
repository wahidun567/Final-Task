<?php

namespace App\Http\Controllers;

use App\Models\tipe_kamar;
use App\Http\Requests\Storetipe_kamarRequest;
use App\Http\Requests\Updatetipe_kamarRequest;

class TipeKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storetipe_kamarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storetipe_kamarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tipe_kamar  $tipe_kamar
     * @return \Illuminate\Http\Response
     */
    public function show(tipe_kamar $tipe_kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tipe_kamar  $tipe_kamar
     * @return \Illuminate\Http\Response
     */
    public function edit(tipe_kamar $tipe_kamar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatetipe_kamarRequest  $request
     * @param  \App\Models\tipe_kamar  $tipe_kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Updatetipe_kamarRequest $request, tipe_kamar $tipe_kamar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tipe_kamar  $tipe_kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(tipe_kamar $tipe_kamar)
    {
        //
    }
}
