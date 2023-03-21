<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table='rooms';

    protected $primaryKey = 'id';

    public function hotel(){
        return $this->belongsTo('App\Models\Hotel','hotel_id');

    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    protected $fillable= [
        'name', 'des','price','img'
    ];

}
