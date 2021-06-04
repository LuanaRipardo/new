<?php

namespace App\Http\Controllers\Principal;

use App\Models\Bikes\BikeCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MotorcycleController extends Controller
{

    public function index()
    {
        $categories = BikeCategory::paginate();
        return view('principal.motorcycle.index', compact('categories'));
    }

    public function category($category)
    {
        $bikes = BikeCategory::where('slug', $category)->firstOrFail()->bikes()->paginate();
        return view('principal.motorcycle.view', compact('bikes'));
    }
}
