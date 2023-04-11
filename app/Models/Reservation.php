<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //Atributos de la cita
    use HasFactory;
    protected $fillable = [
        'nombre_c',
        'nombre_a',
        'edad_a',
        'peso_a',
        'raza_a',
        'service_id',
        'user_id'
    ];
    
    //Relacion 1 a muchos INVERSA
    public function services(){
        return $this->belongsTo(Service::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
