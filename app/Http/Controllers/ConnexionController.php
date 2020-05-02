<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;

class ConnexionController extends Controller
{
    //
    public function formulaire()
    {
        return view('connexion');
    }

    public function traitement()
    {
        $email = request('email');
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        //essaye une connexion et verifie si un utilisateur existe avec ses identifiants
        $resultat = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);

        $student = student::where('email', $email)->first();

        if ($resultat) {
            session()->put('student', $student);
            return redirect('/formation');
        } else {
            return back()->withInput()->withErrors([
                'email' => 'Vos identifiants sont incorrects.'
            ]);
        }
    }
}
