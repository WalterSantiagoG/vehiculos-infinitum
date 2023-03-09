<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaVehiculo extends Model
{
    use HasFactory;
    protected $table = 'personasvehiculos';
    protected $fillable = ['identificacion','placa','vhactual'];
}
