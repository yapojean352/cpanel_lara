<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\utilisateur;
use App\Models\velo;
class utilisateur extends Model
{
    protected $guarded =[];
    use HasFactory;
    public function messageries(){
        return $this->hasMany('App\Models\messagerie');
    }
    public function typeUser(){
        return $this->belongsTo('App\Models\typeuser');
    }
    public function velos(){
        return $this->hasMany('App\velo');
    }
}
