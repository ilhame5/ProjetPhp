<?php

namespace App\Services;

use App\student;

class StudentService
{
    public static function update($id, $lastname, $firstname, $birthdate, $num)
    {
        $student = Student::find($id);
        $student->update([
            'lastname' => $lastname,
            'firstname' => $firstname, 
            'birthdate' => $birthdate, 
            'num' => $num, 
            //'street' => $street, 
            //'city' => $city, 
            //'zipcode' => $zipcode,
            //'address_id' => $address
        ]);
        //auth()->user();
        session()->put('student', $student);//MAJ variable de session
    }
}
