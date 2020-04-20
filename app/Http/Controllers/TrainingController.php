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
        
        apply::create([
                'student_id' => $session_id,
                'training_id' => $training_id
        ]);

        return view('folder/folder', [
            'apply' => $apply,
        ]);
    }
}
