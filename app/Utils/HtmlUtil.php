<?php

namespace App\Utils;

use Illuminate\Support\Facades\Log;

class HtmlUtil
{
    public static function findComments($response): array
    {
        preg_match_all('/<!--(.*?)-->/', $response, $comments);

        return $comments[1];
    }
}
