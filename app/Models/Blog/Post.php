<?php

namespace App\Models\Blog;

use App\Support\Traits\QueryGlobalScopeTrait;
use App\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blog\Post
 *
 * @property-read \App\Models\Blog\Category $category
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\Post query()
 * @mixin \Eloquent
 */
class Post extends Model
{
    use QueryGlobalScopeTrait;
    use Sluggable;
    const TYPE = [1 => 'BLOG'];

    protected $fillable = ['title', 'slug', 'content', 'category_id', 'user_id', 'path', 'thumb_path'];

    // Relacionamentos
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Acessors
    public function getCreatedAtFormattedAttribute() // created_at_formatted
    {
        return $this->getAttribute('created_at')->format('d/m/Y, H:i \h\r\s ');
    }
    public function getCreatedAtFormattedDiffAttribute() // created_at_formatted_diff
    {
        return $this->getAttribute('created_at')->format('M, Y');
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // Scopes
    public function scopeBlog($query)
    {
        return $query->where('category_id', '=', array_search('BLOG', self::TYPE));
    }

}
