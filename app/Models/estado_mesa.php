<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estado_mesa extends Model
{
    protected $primaryKey='IdEstadoMesas';
    protected $fillable =['IdEstadoMesas', 'DescripcionEstadoMesas'];
    use HasFactory;
}
