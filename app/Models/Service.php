<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'precio',
        'imagen',
    ];

    //relacion 1 a n
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
