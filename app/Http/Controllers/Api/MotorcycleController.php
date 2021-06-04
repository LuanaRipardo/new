<?php

namespace App\Http\Controllers\Api;

use App\Models\Bikes\BikeCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MotorcycleController extends Controller
{
    private $valuesToShow = ['id', 'name', 'rpm', 'path', 'bike_category', 'slug'];
    public function motorcycleByCategory($id)
    {
        $category = BikeCategory::findOrFail($id);
        return $category->bikes()->get($this->valuesToShow);
    }
}
