<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class teacher extends Model
{
    public $timestamps = false;
    protected $fillable = ['email', 'password'];
}
