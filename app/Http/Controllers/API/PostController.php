<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Auth;
use App\Models\Category;


class PostController extends Controller
{
    public function list(Request $request)
    {
        $category = $request->c;

        $search = $request->search;

       $query = Post::query();

       if($category)
       {
        $query->where('category_id', $category);
       }

       if($search)
       {
        $query->where('title', 'like', "%$search%");
       }
       
       
       $posts = $query->orderBy('id', 'desc')->paginate(8);


       $categories = Category::all();


        return response()->json([
            'message' => 'success',
            'posts' => $posts,
            'categories' => $categories,
        ], 201);
    }


    public function myPost(Request $request){

        $category = $request->c;

       $query = Post::query();

       if($category)
       {
        $query->where('category_id', $category);
       }
       
       
       $posts = $query->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(8);


       $soft_deleted = Post::onlyTrashed()->get();


       $categories = Category::all();


        return response()->json(compact('posts', 'categories', 'soft_deleted'));
    }
}
