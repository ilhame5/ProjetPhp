<?php

namespace App\Http\Controllers;

use App\apply;
use App\training;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrainingController extends Controller
{
    public function list(){//getlist
        $trainings = training::all();

        return view('training/training', [
            'trainings' => $trainings,
        ]);

    }

    public function TrainingSelections(Request $request){

        $training_id=  $request->listTraining;
        $session_id=session('student')->id;
        
        $apply= apply::where([
            'student_id'=>$session_id
        ]);
        
        if(session('student')->apply->training->id==NULL){//si l'etudiant n'a pas deja enrengistrer une formation->OK
            apply::create([
                'student_id' => $session_id,
                'training_id' => $training_id
            ]);
        }
        else{//SINON on lui fait savoir et on le renvoie vers depot de dossier
            echo 'Vous aviez deja choisi la formation '.session('student')->apply->training->name.'. Il faut maintenant que vous deposiez une candidature';   
        }
        return view('folder/folder', [
            'apply' => $apply,
        ]);
    }
}
