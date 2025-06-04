<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prevision extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'zone',
        'description',
        'date_validite',
        'user_id',
    ];

    // Relation avec l'utilisateur (auteur de la prévision)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
