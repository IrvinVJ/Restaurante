<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presupuesto extends Model
{
    protected $primaryKey='IdPresupuesto';
    protected $fillable =['IdPresupuesto', 'IdPlato', 'IdProducto', 'Cantidad','CostoUnitario'];
    use HasFactory;
}
