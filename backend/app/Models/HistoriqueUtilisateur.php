<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriqueUtilisateur extends Model
{
    use HasFactory;
    protected $table = 'historique_utilisateur';
    protected $fillable = [
        'user_id',
        'action',
        'date_action',
    ];

    /**
     * Relation avec l'utilisateur (chaque historique appartient à un utilisateur).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
