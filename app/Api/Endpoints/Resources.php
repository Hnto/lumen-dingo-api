<?php
namespace App\Api\Endpoints;

use App\Api\Helpers\Assist;
use App\Api\Skeletons\Endpoint;

class Resources implements Endpoint
{
    public function execute(array $params = [])
    {

        return [
            'API' => [
                'message' => 'API is alive',
                'environment' => app()->environment(),
                'documentation' => '',

            ],
            'data' => [
                'resources' => [
                    'users' => $params['domain'] . '/users',
                ],
            ],
        ];
    }
}