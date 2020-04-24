<?php

namespace App\Http\Controllers;

use App\folder;
use Illuminate\Http\Request;
use Validator;

class FolderController extends Controller
{
    public function formulaire(){
        return view('folder/folder');
    }

    public function traitement(Request $request){
        request()->validate([
            'cv' => ['required'],
            'coverletter' => ['required'],
            'screenshot' => ['required'],
            'bulletin' => ['required'],
        ]);

        $request->file('cv')->store('storage');
        $request->file('coverletter')->store('storage');
        $request->file('screenshot')->store('storage');
        $request->file('bulletin')->store('storage');

        dump($request->all());

        if(!empty($request->all())) {
            // ça c'est si tu crée un tout nouveau dossier, sinon tu verif qu'il existe pas avant de le créer et si il existe tu lrecup
            $monDossier = new folder();
            if ( !empty ($request->hasFile('cv')) ) {
              $path = $request->cv->storeAs('storage', $request->cv->getClientOriginalName());
              $monDossier->cv = $path;
            }
            if( !empty ($request->hasFile('screenshot')) ){
              $path = $request->screenshot->storeAs('storage', $request->screenshot->getClientOriginalName());
              $monDossier->screenshot = $path;
            }
            if(!empty($request->hasFile('coverletter'))){
              $path = $request->coverletter->storeAs('storage', $request->coverletter->getClientOriginalName());
              $monDossier->coverletter = $path;
            }
            if(!empty($request->hasFile('bulletin')) ){
              $path = $request->bulletin->storeAs('storage', $request->bulletin->getClientOriginalName());
              $monDossier->bulletin = $path;
            }
            try {
              $monDossier->save();
            } catch (\Illuminate\Database\QueryException $e) {
              // traite l'erreur ici
              return response("error");
            }
          }
          return response("bien enrengistré");
          // retourne l'utilisateur vers cque tu veux quand il a fini
        }
}
