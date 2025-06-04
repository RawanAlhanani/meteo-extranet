<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Prevision;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'nom',
        'email',
        'mot_de_passe',
        'role',
        'date_inscription',
    ];

    protected $hidden = [
        'mot_de_passe',
        'remember_token', // facultatif mais courant
    ];

    public $timestamps = true;

    /**
     * Relation : un utilisateur a plusieurs prévisions.
     */
    public function previsions()
    {
        return $this->hasMany(Prevision::class);
    }
    public function cartes()
    {
        return $this->hasMany(Carte::class);
    }
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    public function historiques()
    {
        return $this->hasMany(HistoriqueUtilisateur::class);
    }
    public function bulletins()
    {
        return $this->hasMany(Bulletin::class);
    }



    /**
     * Redéfinir le nom du champ password utilisé par Laravel.
     * Laravel utilise par défaut "password", donc on le redéfinit ici.
     */
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }
}
