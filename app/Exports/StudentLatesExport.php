<?php

namespace App\Exports;

use App\Models\Late;
use App\Models\Rayon;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentLatesExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'NIS',
            'Nama',
            'Rombel',
            'Rayon',
            'Jumlah Keterlambatan',
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $userRole = auth()->user()->role;

        if ($userRole == 'admin') {
            return $this->getStudentsWithLates();
        } elseif ($userRole == 'ps') {
            $rayonId = Rayon::firstWhere('user_id', auth()->user()->id)->id;
            return $this->getStudentsWithLates($rayonId);
        }

        return collect([]);
    }

    private function getStudentsWithLates($rayonId = null)
    {
        $query = Student::with(['rombel', 'rayon', 'lates']);

        if ($rayonId) {
            $query->where('rayon_id', $rayonId);
        }

        return $query->get()->filter(function ($student) {
            return $student->lates->count() > 0;
        })->map(function ($student) {
            return [
                $student->nis,
                $student->name,
                $student->rombel->rombel,
                $student->rayon->rayon,
                $student->lates->count(),
            ];
        });
    }
}
