<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reclamation extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'cin','email','adresse','type','sujet','photo','num_rec'
    ];
}
