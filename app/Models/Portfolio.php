<?php

namespace App\Models;

use App\Support\Traits\QueryGlobalScopeTrait;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use QueryGlobalScopeTrait;
    protected $fillable = ['path'];
}
