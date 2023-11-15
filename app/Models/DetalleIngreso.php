<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    protected $primaryKey='IdDetalleIngreso';
    protected $fillable =['IdDetalleIngreso', 'IdIngreso', 'IdProducto', 'Cantidad','CostoUnitario', 'CostoTotal'];
    use HasFactory;
}
