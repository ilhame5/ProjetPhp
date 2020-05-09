<?php

namespace App\Http\Controllers;

use App\apply;
use App\Helpers\TeacherHelper;
use App\status;
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
        $applies = apply::all();
        return view('teacher/candidats', [
            'applies' => $applies,
        ]);
    }

    public function candidatsEditStatus(Request $request)
    {
        $statuses = status::all();
        $student_id= $request->student_id;
        $apply= apply::where('student_id',$student_id)->first();

        return view('teacher/editCandidat',compact('apply','statuses'));
    }

    public function candidatUpdateStatus(Request $request)
    {
        $status_id =  $request->status;
        $student_id= $request->id;
        $apply= apply::where('student_id',$student_id);

        $apply->update([
            'status_id' => $status_id,
        ]);
        $applies = apply::all();
        return view('teacher/candidats',compact('applies'));
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

        $id = $request->id;
        $password = $request->password;

        TeacherHelper::update($id, $password);
        return redirect('/admin/home');

    }
}
