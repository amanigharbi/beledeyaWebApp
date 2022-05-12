<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermisConstruction extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'cin','email','adresse','surface','prop','num_autor',
    ];
}
