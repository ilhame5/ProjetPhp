<?php

namespace App\Http\Controllers;

use App\apply;
use App\student;
use App\training;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrainingController extends Controller
{
    public function list()
    {
        $trainings = training::all();

        return view('training/training', [
            'trainings' => $trainings,
        ]);
    }

    public function TrainingSelections(Request $request)
    {
        $candidature = session('student')->apply;
        //DOSSIER EXISTANT
        if (isset(session('student')->apply) && session('student')->apply->folder_id != null) {
            return view('folder/overview', compact("candidature"));
        }

        $training_id =  $request->listTraining;
        $session_id = session('student')->id;

        $apply = apply::where([
            'student_id' => $session_id
        ])->get();

        $student = student::where('email', session('student')->email)->first();

        if (session('student')->apply == NULL && count($apply) == 0) { //si l'etudiant n'a pas deja enrengistrer une formation->OK
            apply::create([
                'student_id' => $session_id,
                'training_id' => $training_id,
                'folder_id' => null,
            ]);
            session()->put('student', $student); //maj variable de session
        } else { //SINON on lui fait savoir et on le renvoie vers depot de dossier
            echo 'Vous aviez deja choisi la formation ' . session('student')->apply->training->name . '. Il faut maintenant que vous deposiez une candidature';
        }

        //PAS DE DOSSIER
        return view('folder/folder', [
            'apply' => $apply,
        ]);
    }
}