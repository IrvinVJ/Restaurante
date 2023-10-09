<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estado_orden extends Model
{
    protected $primaryKey='IdEstadoOrdens';
    protected $fillable =['IdEstadoOrdens', 'DescripcionEstadoOrdens'];
    use HasFactory;
}
