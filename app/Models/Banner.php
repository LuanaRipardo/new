<?php

namespace App\Models;

use App\Support\Traits\QueryGlobalScopeTrait;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use QueryGlobalScopeTrait;

    const LOCAL = [
        'PRINCIPAL',
        'MOTORS'
    ];

    protected $fillable = [
        'path', 'position', 'name', 'description', 'local', 'year', 'link'
    ];

    /*
     * QueryScopes
     * */
    public function scopePrincipal($query) // principal()
    {
        return $query->where('local', '=', array_search('PRINCIPAL', self::LOCAL));
    }

    public function scopeBanner($query) // banner()
    {
        return $query->where('local', '=', array_search('MOTORS', self::LOCAL));
    }

}
