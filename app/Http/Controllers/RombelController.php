<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rombel.index', [
            'rombels' => Rombel::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rombel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'rombel' => 'required|unique:rombels',
        ], [
            'rombel.required' => 'Rombel harus diisi',
            'rombel.unique' => 'Rombel sudah terdaftar',
        ]);

        Rombel::create($validation);

        return redirect()->route('rombel.index')->with('success', 'Rombel baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rombel $rombel)
    {
        return view('rombel.edit', [
            'rombel' => $rombel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rombel $rombel)
    {
        $validation = $request->validate([
            'rombel' => 'required|unique:rombels,rombel,' . $rombel->id,
        ], [
            'rombel.required' => 'Rombel harus diisi',
            'rombel.unique' => 'Rombel sudah terdaftar',
        ]);

        $rombel->update($validation);
        return redirect()->route('rombel.index')->with('success', 'Rombel berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rombel $rombel)
    {
        $rombel->delete();
        return redirect()->route('rombel.index')->with('success', 'Rombel telah dihapus');
    }
}
