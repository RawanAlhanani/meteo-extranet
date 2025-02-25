<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examplaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_book',
        'quantity',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function disponibility()
    {
        return $this->quantity - $this->borrowings()->count() - $this->reservations()->count();
    }
}
