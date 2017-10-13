<?php

namespace App\Http\Controllers\Api;

use App\Api\Factory;
use App\Api\Helpers\Assist;
use App\Api\Helpers\Parameters;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __construct()
    {
    }

    public function resource(Request $request, array $params = [])
    {
        $endpoint = Factory::endpoint(
            Assist::extractResourceFromPath(
                $request
            )
        );

        return response($endpoint->execute(
                array_merge(
                    Parameters::extractBaseFilters($request),
                    $params
                )
            )
        );
    }

    public function init(Request $request, $id = null)
    {
        $params = [
            'url' => $request->fullUrl(),
            'domain' => $request->getBaseUrl(),
            'id' => $id
        ];

        return $this->resource($request, $params);
    }
}
