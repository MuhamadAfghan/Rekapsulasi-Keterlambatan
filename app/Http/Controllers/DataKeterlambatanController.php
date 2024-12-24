<?php

namespace App\Http\Controllers;

use App\Models\Late;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataKeterlambatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('data-keterlambatan.index', [
            'lates' => Late::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data-keterlambatan.create', [
            'students' => Student::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validation = $request->validate(
            [
                'student_id' => 'required|exists:students,id',
                'information' => 'required',
                'bukti' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'bukti.required' => 'File bukti wajib diisi',
                'bukti.mimes' => 'File bukti harus berupa gambar',
                'bukti.image' => 'File bukti harus berupa gambar',
                'bukti.max' => 'File bukti maksimal 2 MB',
                'bukti.exists' => 'File bukti tidak ditemukan',
                'student_id.exists' => 'Siswa tidak ditemukan',
                'student_id.required' => 'Siswa wajib dipilih',
                'information.required' => 'Informasi wajib diisi',
            ]
        );

        $validation['date_time_late'] = now();

        if ($request->hasFile('bukti')) {
            $validation['bukti'] = $request->file('bukti')->store('bukti-late');
        }

        Late::create($validation);
        return redirect()->route('data-keterlambatan.index')->with('success', 'Data keterlambatan baru telah ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(Late $late)
    {
        return view('data-keterlambatan.show', [
            'late' => $late,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Late $late)
    {
        return view('data-keterlambatan.edit', [
            'late' => $late,
            'students' => \App\Models\Student::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Late $late)
    {
        $validation = $request->validate(
            [
                'student_id' => 'required|exists:students,id',
                'information' => 'required',
                'bukti' => 'image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'bukti.mimes' => 'File bukti harus berupa gambar',
                'bukti.image' => 'File bukti harus berupa gambar',
                'bukti.max' => 'File bukti maksimal 2 MB',
                'bukti.exists' => 'File bukti tidak ditemukan',
                'student_id.exists' => 'Siswa tidak ditemukan',
                'student_id.required' => 'Siswa wajib dipilih',
                'information.required' => 'Informasi wajib diisi',
            ]
        );

        $oldLate = Late::findOrFail($late);
        $oldLate->student_id = $request->student_id;
        $oldLate->information = $request->information;

        if ($request->hasFile('bukti')) {
            // Delete the old file if it exists
            if ($oldLate->bukti) {
                Storage::delete($oldLate->bukti);
            }
            $oldLate->bukti = $request->file('bukti')->store('bukti-late');
        }

        $oldLate->save();

        return redirect()->route('data-keterlambatan.index')->with('success', 'Data keterlambatan telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Late $late)
    {
        Storage::delete($late->bukti);
        $late->delete();
        return redirect()->route('data-keterlambatan.index')->with('success', 'Data keterlambatan baru telah ditambahkan');
    }
}
