<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $credential =  $request->validate([
                            'email' => 'required',
                            'password' => 'required'
                        ]);

        if(Auth::attempt($credential))
        {
            $token = auth()->user()->createToken('API Token')->plainTextToken;

            return response()->json([
                'token' => $token
            ]);

            // $request->session()->regenerate();

            // return redirect()->to('/');
        }


        return response()->json([
            'message' => 'success'
        ]);
        
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }

}
