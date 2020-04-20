<?php

namespace App\Http\Controllers;
use App\student;
use Illuminate\Http\Request;
use App\Helpers\StudentHelper;

class StudentController extends Controller
{
    public function list(){
        $students = student::all();
        return view('students/students', [
            'students' => $students,
        ]);
    }

    public function formulaire(){
        /*$session_id=session('student')->id;
        
        $student= student::where([
            'student_id'=>$session_id
        ]);*/
        $student=session('student');
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

        StudentHelper::update($id,$lastname, $firstname, $birthdate, $num, $street, $city, $zipcode, $address);
        //return redirect('/formation');
        return redirect('/formation')->with(['ok' => __('Le profil a bien été mis à jour')]);
    }

    /*public function editProfil(Student $user)
    {
    if (auth()->guest()) {
        flash("Vous devez être connecté pour voir cette page.")->error();
        return redirect('/connexion');
    }

    request()->validate([
        'firstname' => ['required'],
        'lastname' => ['required'],
        'birthdate' => ['required','date'],
        'num' => ['required','numeric'],
        'street' => ['required'],
        'zipcode' => ['required','numeric'],
        'city' => ['required'],
        ]);

    auth()->user()->update([
        'firstname' => request('firstname'),
        'lastname' => request('lastname'),
        'birthdate' => request('birthdate'),
    ]);

    flash("Votre profil a bien ete mis à jour.")->success();

    return redirect('/formation');
    // À faire : modifier l'utilisateur
}*/
}
