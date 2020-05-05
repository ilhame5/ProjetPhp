<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Auth\Authenticatable as BasicAuthentification;


class student extends Model implements Authenticatable
{
    use BasicAuthentification;
    public $timestamps = false;
    protected $fillable = ['firstname', 'lastname','birthdate','num','email','password','address_id','commentaire', 'idCard'];//colonnes remplissable, ou on peut faire des insertions
  
    public function address(){
        return $this->belongsTo('App\address');//un etudiant a une add
    }

    public function apply(){
        return $this->hasOne('App\apply');//un etudiant a une enrengistrremnt
    }

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

}
