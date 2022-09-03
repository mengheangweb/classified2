<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Notifications\PostNotify;

class PostController extends Controller
{

    public function index()
    {

        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('admin.post.listing', compact('posts'));
    }

    public function response($status)
    {
        $post = Post::whereId(request('id'))->first();
        
        
        $post->update(['status' => $status]);

        $user = User::find($post->user_id);

        $user->notify(new PostNotify($post));

        return redirect()->back();
    }
    
}
