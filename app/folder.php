<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class folder extends Model
{
    public $timestamps = false;
    protected $fillable = ['cv', 'coverletter', 'screenshot','bulletin'];

    public function apply(){
        return $this->hasOne('App\apply');//un etudiant a une enrengistrremnt
    }
}
