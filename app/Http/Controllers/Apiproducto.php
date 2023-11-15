<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class Apiproducto extends Controller
{
    public function apiproducto(){
        $productos = Producto::get();
        return response()->json($productos);
    }
}
