<?php

namespace App\Models\Blog;

use App\Support\Traits\QueryGlobalScopeTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blog\Category
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\Category query()
 * @mixin \Eloquent
 */
class Category extends Model
{
    use QueryGlobalScopeTrait;

    protected $fillable = ['name'];

    // Relacionamentos
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
