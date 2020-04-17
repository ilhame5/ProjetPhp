<?php

namespace App\Http\Controllers;

use App\apply;
use App\training;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrainingController extends Controller
{
    public function list(){
        $trainings = training::all();

        return view('training/training', [
            'trainings' => $trainings,
        ]);

    }

    public function TrainingSelections(Request $request){

        $training=  $request->listTraining;
        dd($training);

        $enrengistrement = apply::create([
            'student_id' => session('email'),
            'training_id' => $training->id
        ]);

        return new Response('la formation selectionné est: '.$training);

    }
}
