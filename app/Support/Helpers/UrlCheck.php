<?php

namespace App\Support\Helpers;


class UrlCheck
{

    public static function check($url)
    {
        if(request()->is($url)) {
            return 'active';
        }
        return '';
    }
}
