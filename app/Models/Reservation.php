<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //Atributos de la cita
    use HasFactory;
    protected $fillable = [
        'nombre',
        'edad',
        'peso',
        'raza',
        'user_id',
        'service_id',
    ];
    
    //Relacion 1 a muchos INVERSA
    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
