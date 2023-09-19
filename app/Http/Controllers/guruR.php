<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruM;

class GuruR extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = guruM::all();
        return view('guru',compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nip' => 'required',
            'namaguru' => 'required',
            ',mapel' => 'required',
        ]);

        GuruM::create($request->post());
        return redirect()->route('pesertadidik.index')->with('success', 'Peserta Didik Berhasil Ditambahkan');
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
        $guru = guruM::find($id);
        return view('guru_edit', compact('guru'));
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
        $request->validate([
            'id' => 'required',
            'nip' => 'required',
            'namaguru' => 'required',
            'mapel' => 'required',
        ]);
        $data = request()->except(['_token','_method','submit']);

        pesertadidikM::where('id',$id)->update($data);
        return redirect()->route('guru.index')->
        with('success', 'Guru Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PesertadidikM::where('id',$id)->delete();
        return redirect()->route('Guru.index')->
        with('success', 'Guru Berhasil Dihapus');
    }
}