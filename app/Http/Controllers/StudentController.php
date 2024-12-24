<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $students = Student::all();
        } elseif (auth()->user()->role == 'ps') {
            $students = Student::where('rayon_id', Rayon::firstWhere('user_id', auth()->user()->id)->id)->get();
        }
        return view('student.index', [
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create', [
            'rombels' => Rombel::all(),
            'rayons' => Rayon::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nis' => 'required|unique:students,nis',
            'name' => 'required',
            'rombel_id' => 'required|exists:rombels,id',
            'rayon_id' => 'required|exists:rayons,id',
        ], [
            'nis.required' => 'NIS harus diisi',
            'nis.unique' => 'NIS sudah terdaftar',
            'name.required' => 'Nama harus diisi',
            'rombel_id.required' => 'Rombel harus diisi',
            'rombel_id.exists' => 'Rombel tidak ditemukan',
            'rayon_id.required' => 'Rayon harus diisi',
            'rayon_id.exists' => 'Rayon tidak ditemukan',
        ]);

        Student::create($validation);
        return redirect()->route('student.index')->with('success', 'Siswa baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student.edit', [
            'student' => $student,
            'rombels' => Rombel::all(),
            'rayons' => Rayon::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validation = $request->validate([
            'nis' => 'required|unique:students,nis,' . $student->id,
            'name' => 'required',
            'rombel_id' => 'required|exists:rombels,id',
            'rayon_id' => 'required|exists:rayons,id',
        ], [
            'nis.required' => 'NIS harus diisi',
            'nis.unique' => 'NIS sudah terdaftar',
            'name.required' => 'Nama harus diisi',
            'rombel_id.required' => 'Rombel harus diisi',
            'rombel_id.exists' => 'Rombel tidak ditemukan',
            'rayon_id.required' => 'Rayon harus diisi',
            'rayon_id.exists' => 'Rayon tidak ditemukan',
        ]);

        $student->update($validation);
        return redirect()->route('student.index')->with('success', 'Siswa baru berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        foreach ($student->lates() as $late) {
            $late->delete();
        }
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Siswa baru telah ditambahkan');
    }
}
