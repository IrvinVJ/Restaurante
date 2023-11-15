<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Documento extends Model
{
    protected $primaryKey='IdTipoDocumento';
    protected $fillable =['IdTipoDocumento', 'DescripcionTipoDocumento'];
    use HasFactory;
}
