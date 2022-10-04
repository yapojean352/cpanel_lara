<?php

namespace App\Models;

use App\Models\Velo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class statu extends Model
{
    use HasFactory;
    public function velos(){
        return $this->hasMany(Velo::class);
    }
}
