<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_reservacione extends Model
{
    protected $primaryKey='IdDetalleReservacion';
    protected $fillable =['IdDetalleReservacion', 'IdReservacion', 'IdDetalleOrdens', 'IdCliente'];

    use HasFactory;
}
