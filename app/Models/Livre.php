<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livre extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'prix', 'date_publication', 'auteur_id'];

    public function auteur()
    {
        return $this->belongsTo(Auteur::class);
    }
}
