<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class address extends Model
{
    public $timestamps = false;
    protected $fillable = ['city', 'street', 'zipcode'];
    
    public function student(){
        return $this->hasOne('App\student');//adresse appartient à un etudiant
    }
}
