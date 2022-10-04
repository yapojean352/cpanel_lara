<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\type_velo;
class type_velo extends Model
{
    use HasFactory;
    public function velos(){
        return $this->hasMany(Velo::class);
    }
}
