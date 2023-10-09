<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mesa extends Model
{
    protected $primaryKey='IdMesa';
    protected $fillable =['IdMesa', 'IdEstadoMesas'];
    use HasFactory;
}
