<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index() {

        $posts =  Post::orderBy('id', 'desc')->limit(4)->get();
        // return view('home', ['post'=> $posts]);
        return view('home', compact('posts'));
    }
    public function about() {
        return view('about');
    }
    public function dashboard() {
        return view('dashboard');
    }

}
