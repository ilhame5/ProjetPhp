<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class apply extends Model
{
    public $timestamps = false;
    protected $fillable = ['student_id', 'training_id','folder_id','status_id'];

    public function student(){
        return $this->belongsTo('App\student');//un enrengistrement ft ref à un etudiant
    }

    public function training(){
        return $this->belongsTo('App\training');//un enrengistrement ft ref à une formation
    }

    public function folder(){
        return $this->belongsTo('App\folder');//un enrengistrement ft ref à un dossier
    }

    public function status(){
        return $this->belongsTo('App\status');//un enrengistrement ft ref à un statut
    }
}
