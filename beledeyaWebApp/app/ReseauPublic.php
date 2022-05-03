<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReseauPublic extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'cin','email','adresse','type','description','UserId'
    ];
    public function user()
    {
         return $this->belongsTo("App\User", "UserId","id");
       
    }
}
