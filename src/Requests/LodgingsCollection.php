<?php

namespace Codana\DemoSaloonSdk\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Codana\DemoSaloonSdk\Requests\Lodgings\GetLodgingsRequest;
use ReflectionException;
use Sammyjo20\Saloon\Exceptions\SaloonException;
use Sammyjo20\Saloon\Http\RequestCollection;

class LodgingsCollection extends RequestCollection
{
    /**
     * @throws ReflectionException
     * @throws GuzzleException
     * @throws SaloonException
     */

    public function all(?string $city = null, int $limit = -1, int $page = -1) : array
    {
        $request = $this->connector->request(new GetLodgingsRequest($city, $limit, $page));
        return $request->send()->json();
    }
}
