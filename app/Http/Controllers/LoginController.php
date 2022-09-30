<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){

        // $user = new Main();

        $user = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (auth()->attempt($user)){

            $user = Auth::user();

            $token = $user->createToken('Token')->accessToken;
            
            return response()->json(['token'=>$token]);
        }
        else{
            return response()->json(['Error'=>'Unauthorized User']);
        }
    }
}
