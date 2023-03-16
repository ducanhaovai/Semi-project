<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'price',
        'des',
        'img'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    protected $table='hotels';

    protected $primaryKey = 'id';

    public function hotels(){
        return $this->hasMany('App\Models\Room');
    }

    
}
