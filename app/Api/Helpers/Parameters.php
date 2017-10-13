<?php
namespace App\Api\Helpers;

use Illuminate\Http\Request;

class Parameters
{

    /**
     * Extract base filters
     *
     * @param Request $request
     * @return array
     */
    public static function extractBaseFilters(Request $request)
    {
        return [
            'query' => $request->query->all()
        ];
    }
}
