<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orden extends Model
{
    protected $primaryKey='IdOrdens';
    protected $fillable =['IdOrdens', 'IdMesa', 'IdEstadoOrdens'];
    use HasFactory;
}
