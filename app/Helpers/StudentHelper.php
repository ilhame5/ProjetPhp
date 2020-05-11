<?php

namespace App\Helpers;

use App\student;

class StudentHelper
{
    public static function update($id, $lastname, $firstname, $birthdate, $num, $street, $city, $zipcode, $address)
    {
        $student = Student::find($id);
        $student->update([
            'lastname' => $lastname,
            'firstname' => $firstname, 
            'birthdate' => $birthdate, 
            'num' => $num, 
            'street' => $street, 
            'city' => $city, 
            'zipcode' => $zipcode,
            'address_id' => $address
        ]);
        session()->put('student', $student);//MAJ variable de session
    }
}
