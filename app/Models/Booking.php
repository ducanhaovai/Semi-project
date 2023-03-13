<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'hotel_id',
        'tour_id',
        'checkin_date',
        'checkout_date',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function isBooked()
    {
        return !is_null($this->checkin_date) && !is_null($this->checkout_date);
    }
}
