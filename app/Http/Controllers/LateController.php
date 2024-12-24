<?php

namespace App\Http\Controllers;

use App\Exports\StudentLatesExport;
use App\Models\Late;
use App\Models\Rayon;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class LateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lates = $this->getLatesByRole();
        return view('late.index', ['lates' => $lates]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('late.create', ['students' => Student::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $this->validateRequest($request);

        if ($request->hasFile('bukti')) {
            $validation['bukti'] = $request->file('bukti')->store('bukti-late');
        }

        // $validation['date_time_late'] = now();
        Late::create($validation);

        return redirect()->route('late.index')->with('success', 'Data keterlambatan baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = $this->getStudentByRole($id);
        return view('late.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Late $late)
    {
        return view('late.edit', [
            'late' => $late,
            'students' => Student::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Late $late)
    {
        $validation = $this->validateRequest($request, $late);

        if ($request->hasFile('bukti')) {
            Storage::delete($late->bukti);
            $late->bukti = $request->file('bukti')->store('bukti-late');
        }

        $late->update($validation);

        return redirect()->route('late.index')->with('success', 'Data keterlambatan telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Late $late)
    {
        Storage::delete($late->bukti);
        $late->delete();

        return redirect()->route('late.index')->with('success', 'Data keterlambatan telah dihapus');
    }

    public function rekap()
    {
        $students = $this->getStudentsWithLatesByRole();
        return view('late.rekap', ['students' => $students]);
    }

    public function printPDF($id)
    {
        $student = Student::findOrFail($id);

        if ($student->lates->isEmpty()) {
            return redirect()->route('late.rekap')->with('error', 'Data tidak valid');
        }

        $data = [
            'blank_space' => '..................................', //34
            'late' => $student->lates->first(),
        ];

        $pdf = FacadePdf::loadView('late.pdf.statement', $data);

        return $pdf->stream("surat-peryataaan-keterlambatan ({$student->name}).pdf");
    }

    public function printExcel()
    {
        return Excel::download(new StudentLatesExport(), 'data-keterlambatan.xlsx');
    }

    private function getLatesByRole()
    {
        $user = auth()->user();
        if ($user->role == 'admin') {
            return Late::all();
        } elseif ($user->role == 'ps') {
            $rayonId = Rayon::firstWhere('user_id', $user->id)->id;
            return Late::whereHas('student', function ($query) use ($rayonId) {
                $query->where('rayon_id', $rayonId);
            })->get();
        }
    }

    private function getStudentByRole($id)
    {
        $user = auth()->user();
        if ($user->role == 'admin') {
            return Student::findOrFail($id);
        } elseif ($user->role == 'ps') {
            $rayonId = Rayon::firstWhere('user_id', $user->id)->id;
            return Student::where('rayon_id', $rayonId)->findOrFail($id);
        }
    }

    private function getStudentsWithLatesByRole()
    {
        $user = auth()->user();
        if ($user->role == 'admin') {
            return Student::whereHas('lates')->get();
        } elseif ($user->role == 'ps') {
            return Student::whereHas('lates')
                ->whereHas('rayon', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->get();
        }
    }

    private function validateRequest(Request $request, Late $late = null)
    {
        return $request->validate(
            [
                'student_id' => 'required|exists:students,id',
                'information' => 'required',
                'bukti' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
                'date_time_late' => 'required',
            ],
            [
                'student_id.required' => 'Siswa wajib dipilih',
                'student_id.exists' => 'Siswa tidak ditemukan',
                'information.required' => 'Informasi wajib diisi',
                'bukti.required' => 'File bukti wajib diisi',
                'bukti.image' => 'File bukti harus berupa gambar',
                'bukti.mimes' => 'File bukti harus berupa gambar dengan format jpeg, png, atau jpg',
                'bukti.max' => 'File bukti maksimal 2 MB',
                'date_time_late.required' => 'Tanggal keterlambatan wajib diisi',
            ]
        );
    }
}
