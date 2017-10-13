<?php
namespace App\Api;

use App\Api\Skeletons\Endpoint;

class Factory
{
    /**
     * @param $name
     * @return Endpoint
     */
    public static function endpoint($name)
    {
        $container = app();

        if ($container->offsetExists('endpoint.' . $name)) {
            return $container['endpoint.' . $name];
        }

	    return app('endpoint.resources');
    }
}
