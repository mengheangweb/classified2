<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function switchLang($code)
    {
        session()->put('locale', $code);


        return redirect()->back();
    }
}
