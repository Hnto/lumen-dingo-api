<?php
namespace App\Api\Helpers;

use Illuminate\Http\Request;

class Assist
{
    /**
     * Get correct endpoint from path
     *
     * @param Request $request
     * @return string
     */
    public static function extractResourceFromPath(Request $request)
    {
        $segments = $request->segments();

        if (is_numeric(end($segments))) {
            array_pop($segments);
        }

        $endpoint = end($segments);

        return $endpoint;
    }
}
