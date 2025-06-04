<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
protected $table = 'donnees_climatiques';
    protected $fillable = [
        'titre',
        'type',
        'description',
        'date_publication',
        'user_id',
    ];

        /**
     * Relation avec l'utilisateur (chaque article appartient à un utilisateur).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
