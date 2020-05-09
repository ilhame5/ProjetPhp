<?php

namespace App\Helpers;

use App\teacher;

class TeacherHelper
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