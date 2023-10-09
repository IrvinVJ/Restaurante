<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria_plato extends Model
{
    protected $primaryKey='IdCategoriaPlatos';
    protected $fillable =['IdCategoriaPlatos', 'NombreCategoriaPlato'];
    use HasFactory;
}
