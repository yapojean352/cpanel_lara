<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messagerie extends Model
{
    use HasFactory;
    public function utilisateur(){
        return $this->belongsTo('App\Models\utilisateur');
    }
   
}
