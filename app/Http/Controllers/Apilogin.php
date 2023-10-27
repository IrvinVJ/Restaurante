<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Apilogin extends Controller
{
    public function apilogin(Request $request)
    {
        try {
            $email = $request->email;
            //return $email;
            $pass = $request->password;
            $user = DB::table('users')->
            select('*')->where('email', $email)->first();
            if ($user != null && password_verify($pass, $user->password)){
                return response()->json([
                    'status' => 200,
                    'message'=> "Login Success"
                ]);
            }
            else{
                return response()->json([
                    'status' => 401,
                    'message'=> "Email or Password is incorrect!"
                    ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'res' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
