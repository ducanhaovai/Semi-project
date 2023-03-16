<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table='rooms';

    protected $primaryKey = 'id';

    public function hotels(){
        return $this->belongsTo('App\Models\Hotel','hotel_id');

    }

    protected $fillable= [
        'name', 'des','price','img'
    ];

}
