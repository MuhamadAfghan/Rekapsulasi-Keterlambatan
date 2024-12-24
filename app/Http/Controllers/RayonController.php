<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\User;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rayon.index', [
            'rayons' => Rayon::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rayon.create', [
            'users' => User::where('role', '!=', 'admin')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'rayon' => 'required|unique:rayons,rayon',
            'user_id' => 'required|unique:rayons,user_id|exists:users,id',
        ], [
            'rayon.required' => 'Rayon harus diisi',
            'rayon.unique' => 'Rayon sudah terdaftar',
            'user_id.required' => 'Wali kelas harus diisi',
            'user_id.unique' => 'Wali kelas sudah terdaftar',
            'user_id.exists' => 'Wali kelas tidak ditemukan',
        ]);

        Rayon::create($validation);
        return redirect()->route('rayon.index')->with('success', 'Rayon baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rayon $rayon)
    {
        return view('rayon.edit', [
            'rayon' => $rayon,
            'users' => User::where('role', '!=', 'admin')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rayon $rayon)
    {
        $validation = $request->validate([
            'rayon' => 'required|unique:rayons,rayon,' . $rayon->id,
            'user_id' => 'required|exists:users,id|unique:rayons,user_id,' . $rayon->id,
        ], [
            'rayon.required' => 'Rayon harus diisi',
            'rayon.unique' => 'Rayon sudah terdaftar',
            'user_id.required' => 'Wali kelas harus diisi',
            'user_id.exists' => 'Wali kelas tidak ditemukan',
            'user_id.unique' => 'Wali kelas sudah terdaftar',
        ]);

        $rayon->update($validation);
        return redirect()->route('rayon.index')->with('success', 'Rayon berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rayon $rayon)
    {
        $rayon->delete();
        return redirect()->route('rayon.index')->with('success', 'Rayon telah dihapus');
    }
}
