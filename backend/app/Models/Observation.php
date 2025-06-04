<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'type',
        'description',
        'date_observation',
        'user_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
