<?php

namespace App\Models;

<<<<<<< HEAD
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
=======
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    const Role_Admin = 'admin';
    const Role_User = 'user';
    const ROLE_LIBRARIAN = 'librarian';


    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'Admin';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    public function isLibrarian()
    {
        return $this->role === 'librarian';
>>>>>>> 4d5adbcd7abac5b4ddd7716a201e1e65d62eee9f
    }
}
