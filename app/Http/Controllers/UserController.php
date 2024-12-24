<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index', [
            'users' => User::where('id', '!=',  auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            // 'password' => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah terdaftar',
            // 'password.required' => 'Password harus diisi',
        ]);

        // generate password  dari 3 kata depan nama dan 3 kata depan email.
        $password = substr($validation['name'], 0, 3) . substr(explode('@', $validation['email'])[0], 0, 3);
        $validation['password'] = Hash::make($password);

        User::create($validation);
        return redirect()->route('user.index')->with('success', 'User baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah terdaftar',
        ]);

        $user->update($validation);
        return redirect()->route('user.index')->with('success', 'User berhasil diubah');
    }

    public function changePassword(Request $request, User $user)
    {
        $validation = $request->validate([
            'password' => 'required',
        ], [
            'password.required' => 'Password harus diisi',
        ]);

        $validation['password'] = Hash::make($validation['password']);

        $user->update($validation);
        return redirect()->back()->with('success', 'Password berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        foreach ($user->students() as $student) {
            $student->delete();
        }
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User telah dihapus');
    }
}
