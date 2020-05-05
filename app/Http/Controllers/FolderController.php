<?php

namespace App\Http\Controllers;

use App\apply;
use App\folder;
use App\student;
use Illuminate\Http\Request;
use Validator;
use DB;
use Response;


class FolderController extends Controller
{
  public function formulaire()
  {
    return view('folder/folder');
  }

  public function traitement(Request $request)
  {

    $request->file('cv')->store('storage');
    $request->file('coverletter')->store('storage');
    $request->file('screenshot')->store('storage');
    $request->file('bulletin')->store('storage');
    
    $commentaire = $request->commentaire;

    $candidature = session('student')->apply;
    //dd(session('student')->apply->folder_id);
    if ((!empty($request->all())) && session('student')->apply->folder_id == NULL) { // test si le folder n'existe pas (==null) cad qu'il n'a pas encore été créer
      // ça c'est si je crée un tout nouveau dossier, sinon je dois verif qu'il existe pas avant de le créer et si il existe je le recup
      $monDossier = new folder();
      if (!empty($request->hasFile('cv'))) {
        $path = $request->cv->storeAs('storage', session('student')->id . '_' . $request->cv->getClientOriginalName());
        $monDossier->cv = str_replace('storage/', '', $path);
      }
      if (!empty($request->hasFile('screenshot'))) {
        $path = $request->screenshot->storeAs('storage', session('student')->id . '_' . $request->screenshot->getClientOriginalName());
        $monDossier->screenshot = str_replace('storage/', '', $path);
      }
      if (!empty($request->hasFile('coverletter'))) {
        $path = $request->coverletter->storeAs('storage', session('student')->id . '_' . $request->coverletter->getClientOriginalName());
        $monDossier->coverletter = str_replace('storage/', '', $path);
      }
      if (!empty($request->hasFile('bulletin'))) {
        $path = $request->bulletin->storeAs('storage', session('student')->id . '_' . $request->bulletin->getClientOriginalName());
        $monDossier->bulletin = str_replace('storage/', '', $path);
      }

      session('student')->update([
        'commentaire' => $commentaire,
      ]);

      try {
        $monDossier->save();
        session('student')->apply->update([
          'folder_id' => $monDossier->id,
          'status_id' => 1,
        ]);

        //return response("bien enrengistré");
        return view('folder/overview', compact('monDossier'));
        // je retourne l'utilisateur vers un message quand c'est bon

      } catch (\Illuminate\Database\QueryException $e) {
        // traitement erreur
        return response("error");
      }
    } else { //je dois recuperer le dossier existant
      echo "dossier deja validé";
      return view('folder/overview', compact('candidature'));
    }
  }

  public function download()
  {
    $downloads = DB::table('folders')->get();
    return view('folder/downloadFiles', compact('downloads'));
  }

  public function getdownload(Request $request)
  {
    //PDF file is stored under project/public/download/info.pdf
    $filename = $request->filename;
    $file = storage_path() . "/app/storage/" . $filename;

    $headers = array(
      'Content-Type: application/pdf',
    );

    return Response::download($file, $filename, $headers);
  }
}
