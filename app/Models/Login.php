<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'admins';

    protected $fillable = ['name', 'email', 'password'];


}
