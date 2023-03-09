<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = 'personas';
   	protected $primaryKey = 'identificacion';
    protected $fillable = ['nombres','apellidos','fnacimiento','identificacion','profesion','casado','ingresosm'];
}
