<?php

namespace App\Http\Controllers;

use App\Models\Late;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userRole = auth()->user()->role;

        if ($userRole == 'admin') {
            return $this->adminDashboard();
        } elseif ($userRole == 'ps') {
            return $this->psDashboard();
        }

        return abort(403, 'Unauthorized action.');
    }

    private function adminDashboard()
    {
        return view('dashboard', [
            'students' => Student::all(),
            'admins' => User::where('role', 'admin')->get(),
            'users' => User::where('role', '!=', 'admin')->get(),
            'rombels' => Rombel::all(),
            'rayons' => Rayon::all(),
        ]);
    }

    private function psDashboard()
    {
        $rayon = Rayon::firstWhere('user_id', auth()->user()->id);
        $students = Student::where('rayon_id', $rayon->id)->get();
        $latesToday = Late::whereIn('student_id', function ($query) use ($rayon) {
            $query->select('id')
                ->from('students')
                ->where('rayon_id', $rayon->id)
                ->whereDate('date_time_late', now());
        })->get();

        return view('dashboard', [
            'students' => $students,
            'rayon' => $rayon,
            'lates' => $latesToday,
        ]);
    }
}
