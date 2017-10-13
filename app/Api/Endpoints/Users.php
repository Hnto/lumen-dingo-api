<?php
namespace App\Api\Endpoints;

use App\Api\Helpers\ArrayData;
use App\Api\Helpers\Object;
use App\Api\Skeletons\Endpoint;
use App\Api\Transformers\UserTransformer;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection as FractalCollection;
use App\User;

class Users implements Endpoint
{

    /**
     * @var User
     */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param array $params
     * @return array
     */
    public function execute(array $params = [])
    {
        if (isset($params['query']['all'])) {

            return ArrayData::data(
                User::all()
            );
        }

        if (!is_null($params['id'])) {

            $this->transform($params, $this->user->user($params['id']), false);
        }

        return $this->transform($params, $this->user->users());

    }

    /**
     * @param $params
     * @param $data
     * @param bool $paginate
     * @return array
     */
    private function transform($params, $data, $paginate = true)
    {
        $manager = new Manager();

        $resource = new FractalCollection($data, new UserTransformer($this->user));

        $queryParams = array_diff_key(
            $params['query'],
            array_flip(
                ['page']
            )
        );

        if ($paginate === true) {
            $data->appends($queryParams);

            $adapter = new IlluminatePaginatorAdapter($data);

            $resource->setPaginator($adapter);
        }

        return $manager->createData($resource)->toArray();
    }
}
