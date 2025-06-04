<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    public function auteur()
    {
        return $this->belongsTo(Auteur::class);
    }
}
