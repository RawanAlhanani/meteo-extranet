<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carte extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'url',
        'date_mise_jour',
        'date_validité',
        'user_id',
    ];

    protected $casts = [
        'date_mise_jour' => 'date',
        'date_validité' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
