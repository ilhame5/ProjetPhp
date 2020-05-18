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
            $incomplet = "Reçu incomplet en attente de complément";
            session()->put('student', $student);
            if(empty(auth()->user()->apply)){
                return redirect('/formation');
            }
            elseif (isset(auth()->user()->apply) && auth()->user()->apply->folder_id != null && (strcmp(auth()->user()->apply->status->libelle, $incomplet) == 0)) {
                return redirect('/candidature');
            }
            
            elseif(auth()->user()->apply->training_id != null && auth()->user()->apply->folder_id == null){
                return redirect('/candidature');
            }

            elseif (isset(auth()->user()->apply) && auth()->user()->apply->folder_id != null) {
                return redirect('/validation');
            }

        } else {
            return back()->withInput()->withErrors([
                'email' => 'Vos identifiants sont incorrects.'
            ]);
        }
    }
}
