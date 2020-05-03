<?php

namespace App\Http\Controllers;

use App\apply;
use App\training;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrainingController extends Controller
{
    public function list()
    { //getlist
        //var_dump(auth()->check());
        $trainings = training::all();

        return view('training/training', [
            'trainings' => $trainings,
        ]);
    }

    public function TrainingSelections(Request $request)
    {
        $candidature=session('student')->apply;
        //DOSSIER EXISTANT
        if (isset(session('student')->apply) && session('student')->apply->folder_id != null) {
            /*return view('folder/validation', [
        'apply' => $apply,*/
            //return response('dossier deja validée');
            return view('folder/overview',compact("candidature"));
        }

        $training_id =  $request->listTraining;
        $session_id = session('student')->id;

        $apply = apply::where([
            'student_id' => $session_id
        ])->get();
        
        //dd(count($apply));
        
        if (session('student')->apply == NULL && count($apply)==0) { //si l'etudiant n'a pas deja enrengistrer une formation->OK
            apply::create([
                'student_id' => $session_id,
                'training_id' => $training_id,
                'folder_id' => null,
            ]);
        }
        else { //SINON on lui fait savoir et on le renvoie vers depot de dossier
            //dd(session('student'));
            echo 'Vous aviez deja choisi la formation ' . session('student')->apply->training->name . '. Il faut maintenant que vous deposiez une candidature';
            //echo 'Vous aviez deja choisi une formation';
        }

        //PAS DE DOSSIER
        return view('folder/folder', [
            'apply' => $apply,
        ]);
    }
}
