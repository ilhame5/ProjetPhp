<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class student extends Model
{
    public $timestamps = false;
    protected $fillable = ['firstname', 'lastname','birthdate','num','email','password'];
  
    public function address(){
        return $this->belongsTo('App\Address');//un etudiant a une add
    }

    public function apply(){
        return $this->hasOne('App\Apply');//un etudiant a une enrengistrremnt
    }
}
