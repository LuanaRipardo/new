<?php

namespace App\Models;

use App\Support\Traits\QueryGlobalScopeTrait;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use QueryGlobalScopeTrait;
    protected $fillable = ['title', 'content', 'slug', 'type', 'path', 'thumb_path'];
}
