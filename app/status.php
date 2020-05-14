<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class status extends Model
{
    public $timestamps = false;
    protected $fillable = ['libelle'];

    public function apply(){
        return $this->hasOne('App\apply');//un etudiant a une candidature
    }
}
