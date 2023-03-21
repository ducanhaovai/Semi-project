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

    

    protected $table='hotels';

    protected $primaryKey = 'id';

    public function room(){
        return $this->hasMany('App\Models\Room');
    }

    
}
