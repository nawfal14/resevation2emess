<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'representation_id',
        'booking_date',
        'status',
        'quantity',
        'price_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function representation()
    {
        return $this->belongsTo(Representation::class);
    }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }
}
