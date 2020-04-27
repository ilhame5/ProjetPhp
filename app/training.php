<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class training extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function apply(){
        return $this->hasOne('App\apply');//un etudiant a une enrengistrremnt
    }
}
