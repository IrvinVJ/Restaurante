<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_orden extends Model
{
    protected $primaryKey='IdDetalleOrdens';
    protected $fillable =['IdDetalleOrdens', 'Cantidad', 'IdOrdens', 'IdPlato', 'IdMesa', 'CostoTotal'];
    use HasFactory;
}
