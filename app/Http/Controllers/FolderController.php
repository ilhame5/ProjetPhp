<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function formulaire(){
        return view('folder/folder');
    }

    public function traitement(Request $request){
        request()->validate([
            'cv' => ['required','uploaded','file'],
            'coverletter' => ['required','uploaded'],
            'screenshot' => ['required','uploaded'],
            'bulletin' => ['required','uploaded'],
        ]);
        dd($request);
    }
}
