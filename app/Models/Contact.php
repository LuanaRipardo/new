<?php

namespace App\Models;

use App\Support\Traits\QueryGlobalScopeTrait;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use QueryGlobalScopeTrait;
    protected $fillable = ['name', 'email', 'phone', 'message', 'read'];

    public function getReadFormattedAttribute() // read_formatted
    {
        if($this->getAttribute('read') == 0) {
            $status = '<span class="badge badge-danger">Não lido</span>';
        } else {
            $status = '<span class="badge badge-light">Lido</span>';
        }
        return $status;
    }
}
