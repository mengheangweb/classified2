<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;
use App\Mail\WelcomeMessage;
use App\Jobs\SendWelcome;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $credential =  $request->validate([
                            'email' => 'required',
                            'password' => 'required'
                        ]);

        if(Auth::attempt($credential))
        {
            $request->session()->regenerate();

            return redirect()->to('/');
        }


        return redirect()->back()->withError('Incorrect credential');
        
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

        Auth::login($user);

        

        SendWelcome::dispatch($user)->delay(now()->addMinutes(1));


        return redirect()->to('/')->with('message', 'Great, you have successfully created account.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect()->to('/');
    }
}
