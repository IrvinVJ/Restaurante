<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $primaryKey='IdVenta';
    protected $fillable =['IdVenta', 'Serie', 'Correlativo', 'IdDetalleOrdens', 'IdEstadoVentas', 'IdTipoDocumento'];
    use HasFactory;
}
