<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallary extends Model
{
    public function categname()
    {
        return $this->belongsTo('App\Models\Fotocat','fotocat_id','id')->withDefault();
    }
}
