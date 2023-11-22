<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_documento extends Model
{
    protected $primaryKey='IdTipoDocumento';
    protected $fillable =['IdTipoDocumento', 'DescripcionTipoDocumento'];
    use HasFactory;
}
