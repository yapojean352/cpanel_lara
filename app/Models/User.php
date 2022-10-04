<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\velo;
use Illuminate\Database\Eloquent\Relations;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'password',
        'nom',
        'prenoms',
       'dateNaiss',
        'adrresse', 
        'rue',
       'numAppart',
        'province',
        'ville',
       'typeusers_id',
        'pays',
        'codePostal',
        'telephone',
       'email',
       'poste',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //les diffententes relations
    public function messageries(){
        return $this->hasMany('App\Models\messagerie');
    }
    public function typeUser(){
        return $this->belongsTo('App\Models\typeuser');
    }
    public function velos(){
        return $this->hasMany('App\Models\velo');
    }
}
