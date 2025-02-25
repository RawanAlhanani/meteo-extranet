<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_examplaire',
        'reservation_Date',
        'expiryDate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function examplaire()
    {
        return $this->belongsTo(Examplaire::class, 'id_examplaire');
    }

    public function bookRecord()
    {
        return $this->hasOne(BorrowRecord::class);
    }
}
