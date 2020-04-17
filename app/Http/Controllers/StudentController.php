<?php

namespace App\Http\Controllers;
use App\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function list(){
        $students = student::all();
        return view('students/students', [
            'students' => $students,
        ]);
    }
}
