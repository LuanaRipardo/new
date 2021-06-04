<?php

namespace App\Models\Bikes;

use App\Support\Traits\QueryGlobalScopeTrait;
use Illuminate\Database\Eloquent\Model;

class BikeImage extends Model
{
    use QueryGlobalScopeTrait;

    protected $fillable = ['path', 'bike_id', 'thumb_path'];
}
