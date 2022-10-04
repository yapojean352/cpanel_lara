<?php

namespace App\Models;

use App\Models\Velo;
use App\Models\Photo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    protected $guarded =[];
    //pour deactiver le timestamp par defaut a true
    public $timestamps= false;
    public function velo(){
        //return $this->hasMany('App\odels\photo');
        return $this->belongsTo(Velo::class);
    }

    
}
