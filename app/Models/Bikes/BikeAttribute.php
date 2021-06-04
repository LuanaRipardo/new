<?php

namespace App\Models\Bikes;

use App\Support\Traits\QueryGlobalScopeTrait;
use Illuminate\Database\Eloquent\Model;

class BikeAttribute extends Model
{
    use QueryGlobalScopeTrait;

    protected $fillable = ['name', 'bike_id'];
}
