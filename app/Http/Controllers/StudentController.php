<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Contracts\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = Student::with(['profile', 'studyProgram', 'courses'])
            ->orderBy('nim')->get();

        return view('students.index', compact('students'));
    }
}