<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    use HasFactory;
    protected $table = 'bulletins';
    protected $fillable = [
        'titre',
        'region',
        'type',
        'description',
        'date',
        'user_id',
    ];

    /**
     * Relation : un bulletin appartient à un utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
