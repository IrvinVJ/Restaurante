<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estado_venta extends Model
{
    protected $primaryKey='IdEstadoVentas';
    protected $fillable =['IdEstadoVentas', 'DescripcionEstadoVentas'];
    use HasFactory;
}
