<?php

namespace App\Models\Bikes;

use App\Support\Traits\QueryGlobalScopeTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class BikeCategory extends Model
{
    use QueryGlobalScopeTrait, Sluggable;
    protected $fillable = ['slug', 'name'];

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

    /*
     * Relationships
     * */
    public function bikes()
    {
        return $this->hasMany(Bike::class, 'bike_category');
    }
}
