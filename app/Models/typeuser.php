<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\typeuser;
class typeuser extends Model
{
    protected $guarded =[];
    use HasFactory;
    public function utilisateurs(){
        return $this->hasMany('App\Models\utilisateur');
    }
}
