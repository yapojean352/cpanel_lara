<?php
namespace App\Models;

use App\Models\Photo;
use App\Models\type_velo;
use Illuminate\Foundation\Auth\User ;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations;

class Velo extends Model
{
    protected $guarded =[];
    use HasFactory;
    public function typeVelo(){
        return $this->belongsTo('App\Models\type_velo');
    }
    public function statu(){
        return $this->belongsTo(statu::class);
    }
    public function utilisateur(){
        return $this->belongsTo('App\Models\utilisateur');
    }
    public function user(){
        return $this->belongsTo('App\Models\user');
    }
    //========
    public function photos(){
        //return $this->hasMany('App\odels\photo');
        return $this->hasMany(Photo::class);
        
    }
}
