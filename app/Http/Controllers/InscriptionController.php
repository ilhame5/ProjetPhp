<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\address;
use App\student;
use App\training;
use App\folder;

class InscriptionController extends Controller
{
    //
    public function formulaire(){
        return view('inscription');
    }

    public function traitement(){
        request()->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'birthdate' => ['required','date'],
            'num' => ['required','numeric'],
            'street' => ['required'],
            'zipcode' => ['required','numeric'],
            'city' => ['required'],
            'email' => ['required','email','unique:students'],
            'password' => ['required','confirmed','min:6'],
        ]);
    
        $address = address::create([
            'street' => request('street'),
            'zipcode' => request('zipcode'),
            'city' => request('city'),
        ]);
    
        $student = student::create([
            'firstname' => request('firstname'),
            'lastname' => request('lastname'),
            'birthdate' => request('birthdate'),
            'num' => request('num'),
            'email' => request('email'),
            'password' => request('password'),
            'address_id' => $address->id
        ]);
        session()->put('student', $student);

        return redirect('/connexion');
    }
    
}
