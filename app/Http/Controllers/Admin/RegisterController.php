<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\address;
use App\student;
use App\training;
use App\folder;
use App\teacher;

class RegisterController extends Controller
{
    //
    protected $guard = 'admin';
    public function formulaire(){
        return view('teacher/addTeacher');
    }

    public function traitement(){
        request()->validate([
            'email' => ['required','email','unique:teachers'],
            'password' => ['required'],
        ]);
    
        $teacher = teacher::create([
            'email' => request('email'),
            'password' => request('password'),
        ]);
        session()->put('teacher', $teacher);

        return redirect('/admin/enseignants');
    }
}