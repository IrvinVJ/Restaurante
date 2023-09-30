<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    protected $primaryKey='IdUnidadMedida';
    protected $fillable =['IdUnidadMedida', 'DescripcionUM'];
    use HasFactory;
}
