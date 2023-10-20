<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $primaryKey='IdCliente';
    protected $fillable = [
        'IdCliente',
        'Dni',
        'NombresCliente',
        'ApellidosCliente',
        'NroTelefono'
    ];
    use HasFactory;
}
