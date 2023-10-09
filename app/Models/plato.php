<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plato extends Model
{
    protected $primaryKey='IdPlato';
    protected $fillable =['IdPlato', 'NombrePlato', 'PrecioPlato', 'IdCategoriaPlatos'];
    use HasFactory;
}
