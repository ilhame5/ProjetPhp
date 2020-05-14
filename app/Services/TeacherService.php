<?php

namespace App\Services;

use App\teacher;

class TeacherService
{
    public static function update($id, $password)
    {
        $teacher = Teacher::find($id);
        $teacher->update([
            'password' => $password,
        ]);
        session()->put('teacher', $teacher);//MAJ variable de session
    }
}