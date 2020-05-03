<?php

namespace App\Http\Controllers;

use App\apply;
use App\folder;
use Illuminate\Http\Request;
use Validator;

class FolderController extends Controller
{
  public function formulaire()
  {
    return view('folder/folder');
  }

  public function traitement(Request $request)
  {
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
    
    $candidature=session('student')->apply;
    //dd(session('student')->apply->folder_id);
    if ((!empty($request->all())) && session('student')->apply->folder_id == NULL) {// test si le folder n'existe pas (==null) cad qu'il n'a pas encore été créer
      // ça c'est si je crée un tout nouveau dossier, sinon je dois verif qu'il existe pas avant de le créer et si il existe je le recup
      $monDossier = new folder();
      if (!empty($request->hasFile('cv'))) {
        $path = $request->cv->storeAs('storage', $request->cv->getClientOriginalName());
        $monDossier->cv = $path;
      }
      if (!empty($request->hasFile('screenshot'))) {
        $path = $request->screenshot->storeAs('storage', $request->screenshot->getClientOriginalName());
        $monDossier->screenshot = $path;
      }
      if (!empty($request->hasFile('coverletter'))) {
        $path = $request->coverletter->storeAs('storage', $request->coverletter->getClientOriginalName());
        $monDossier->coverletter = $path;
      }
      if (!empty($request->hasFile('bulletin'))) {
        $path = $request->bulletin->storeAs('storage', $request->bulletin->getClientOriginalName());
        $monDossier->bulletin = $path;
      }
      try {
        $monDossier->save();
        session('student')->apply->update([
          'folder_id' => $monDossier->id,
          'status_id' => 1,
        ]);

        //return response("bien enrengistré");
        return view('folder/overview',compact('monDossier'));
        // je retourne l'utilisateur vers un message quand c'est bon

      } catch (\Illuminate\Database\QueryException $e) {
        // traitement erreur
        return response("error");
      }
    }
    else {//je dois recuperer le dossier existant
      echo "dossier deja validé";
      return view('folder/overview',compact('candidature'));
    }
  }
}
