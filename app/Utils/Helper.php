<?php

namespace App\Utils;

class Helper
{

    public static function dd($arr)
    {
        echo "<pre>";
        var_dump($arr);
        echo "</pre>";
    }
}
