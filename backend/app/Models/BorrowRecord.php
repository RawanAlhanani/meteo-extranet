<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_examplaire',
        'id_reservation',
        'borrow_date',
        'return_date',
        'due_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function examplaire()
    {
        return $this->belongsTo(Examplaire::class, 'id_examplaire');
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'id_reservation');
    }

   
}
