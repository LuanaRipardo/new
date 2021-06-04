<?php

namespace App\Http\Controllers\Principal;

use App\Models\Bikes\Bike;
use App\Models\Blog\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::blog()->limit(3)->get();
        return view('principal.home', compact('posts'));
    }

    public function about()
    {
        return view('principal.about');
    }

    public function motorcycle($slug)
    {
        $bike = Bike::where('slug', '=', $slug)->firstOrFail();
        return view('principal.motorcycle', compact('bike'));
    }

    public function locals()
    {
        return view('principal.locals');
    }
}
