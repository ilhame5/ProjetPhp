<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Auth\Authenticatable as BasicAuthentification;
use Illuminate\Contracts\Auth\Authenticatable;

class teacher extends Model implements Authenticatable
{
    use BasicAuthentification;
    protected $guard = 'admin';
    public $timestamps = false;
    protected $fillable = ['email', 'password'];

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
