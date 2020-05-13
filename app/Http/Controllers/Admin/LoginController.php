<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\teacher;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //use AuthenticatesUsers;
    protected $guard = 'admin';
    protected $redirectTo = '/admin/connexion';

    public function showLoginForm()
    {
        return view('admin.connexion');
    }
    protected function guard()
    {
        return Auth::guard($this->guard);
    }

    public function formulaire()
    {
        //dd(Auth::guard('admin'));
        return view('admin/connexion');
    }

    public function traitement()
    {
        $email = request('email');
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required','min:6'],
        ]);

        //essaye une connexion et verifie si un utilisateur existe avec ses identifiants
        $resultat = Auth::guard('admin')->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);

        $teacher = teacher::where('email', $email)->first();
        //dd(Auth::guard($student));
        if ($resultat) { //si un teacher existe avec ces identifiants ->ok
            session()->put('teacher', $teacher);
            return redirect('admin/home');
        } else { //sinon on renvoie vers le form
            return back()->withInput()->withErrors([
                'email' => 'Vos identifiants sont incorrects.'
            ]);
        }
    }
}
