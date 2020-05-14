<?php

namespace App\Http\Controllers;
use App\student;
use Illuminate\Http\Request;
use App\Services\StudentService;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function getList(){
        $students = student::all();
        return view('students/students', [
            'students' => $students,
        ]);
    }

    public function formulaire(){
        $student= auth()->user();
        return view('students/editProfil',compact('student'));
    }

    public function editProfil(Request $request){
        $id=$request->id;
        $lastname= $request->lastname;
        $firstname=$request->firstname;
        $birthdate=$request->birthdate;
        $num=$request->num;
        $street=$request->street;
        $city=$request->city;
        $zipcode=$request->zipcode;
        $address= $request->addressid;

        Auth::user()->address->update(['zipcode'=>$zipcode, 'street'=>$street, 'city'=>$city]);

        StudentService::update($id,$lastname, $firstname, $birthdate, $num);
        return redirect('/candidature');
    }
}
