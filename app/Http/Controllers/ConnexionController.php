<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;

class ConnexionController extends Controller
{
    //
    public function formulaire(){
        return view('connexion');
    }

    public function traitement(){
        request()->validate([
            'email' => ['required','email'],
            'password' => ['required','min:6'],
        ]);

        //essaye une connexion et verifie si un utilisateur existe avec ses identifiants
        $resultat=auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);
        echo($resultat);
        if($resultat){
            return redirect('/mon_compte');
        }
        else{
            return back()->withInput()->withErrors([
                'email'=> 'Vos identifiants sont incorrects.'
            ]) ;
        }
        return "Traitement formulaire connexion";
    }
}
