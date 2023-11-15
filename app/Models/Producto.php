<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $primaryKey='IdProducto';
    protected $fillable =['NombreProducto', 'Stock', 'PrecioProducto'];
    use HasFactory;
}
