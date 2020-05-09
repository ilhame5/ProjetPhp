<?php

namespace App\Http\Controllers;

use App\Helpers\TeacherHelper;
use App\student;
use App\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    //
    public function homepage()
    {
        return view('/admin/home');
    }

    public function getList()
    {
        $teachers = teacher::all();
        return view('/teacher/liste', [
            'teachers' => $teachers,
        ]);
    }

    public function candidats()
    {
        $students = student::all();
        return view('/teacher/candidats', [
            'students' => $students,
        ]);
    }

    public function changePasswordForm()
    {
        $teacher = session('teacher');
        return view('/teacher/editPassword', compact('teacher'));
    }

    public function changePassword(Request $request)
    {
        request()->validate([
            'password' => ['required', 'confirmed', 'min:6'],
            'password_confirmation' => ['required'],
        ]);

        /*Auth::guard('admin')->update([
            'password' => request('password'),
        ]);*/

        $id = $request->id;
        $password = $request->password;

        TeacherHelper::update($id, $password);
        return redirect('/admin/home');

    }
}
