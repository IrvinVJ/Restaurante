<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $primaryKey='IdIngreso';
    protected $fillable =['IdIngreso'];
    use HasFactory;
}
