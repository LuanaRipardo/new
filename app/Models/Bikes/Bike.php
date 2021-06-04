<?php

namespace App\Models\Bikes;

use App\Support\Traits\QueryGlobalScopeTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use QueryGlobalScopeTrait, Sluggable;
    protected $fillable = [
        'name', 'rpm', 'slug', 'price', 'year', 'description', 'path', 'bike_category'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    // Relationships
    public function attributes()
    {
        return $this->hasMany(BikeAttribute::class);
    }

    public function images()
    {
        return $this->hasMany(BikeImage::class);
    }

    public function category()
    {
        return $this->belongsTo(BikeCategory::class, 'bike_category');
    }
}
