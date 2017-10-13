<?php
namespace App\Api\Skeletons;

interface Endpoint
{
    /**
     * Execute api endpoint by an array of parameters
     *
     * @param array $params
     * @return array
     */
    public function execute(array $params = []);
}
