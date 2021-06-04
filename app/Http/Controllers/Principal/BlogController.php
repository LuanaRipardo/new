<?php

namespace App\Http\Controllers\Principal;

use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class BlogController extends Controller
{
    public function index()
    {
        if(request('category')) {
            $posts = Post::where('category_id', '=', request('category'))->paginate();
        } else {
            $posts = request()->get('q') != null ? Post::where('title', 'like', '%' . request()->get('q') . '%')->blog()->paginate() : Post::blog()->paginate();
        }
        return view('principal.blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', '=', $slug)->firstOrFail();
        $others = $post->category->posts()->limit(8)->inRandomOrder()->get();
        $categories = Category::all();

        return view('principal.blog.show', compact('post', 'others', 'categories'));
    }
}
