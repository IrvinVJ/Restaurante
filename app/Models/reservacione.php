<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservacione extends Model
{
    protected $primaryKey='IdReservacion';
    protected $fillable =['IdReservacion', 'IdCliente', 'Fecha', 'Hora'];
    use HasFactory;
}
