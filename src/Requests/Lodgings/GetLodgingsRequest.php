<?php

namespace Codana\DemoSaloonSdk\Requests\Lodgings;

use Codana\DemoSaloonSdk\Requests\Request;
use Sammyjo20\Saloon\Constants\Saloon;

class GetLodgingsRequest extends Request
{
    /**
     * Define the method that the request will use.
     *
     * @var string|null
     */
    protected ?string $method = Saloon::GET;

    /**
     * Define constructor.
     *
     * @param string|null $city City you'd like to request lodgings from, leaving it empty will return all lodgings from Flanders.
     * @param int $limit Amount per page in pagination. -1 is the default (unlimited).
     * @param int $page current page in pagination. -1 is the default (disable pagination).
     */
    public function __construct(protected ?string $city, protected int $limit, protected int $page)
    {
        $this->city = $city;
        $this->limit = $limit;
        $this->page = $page;
    }

    /**
     * @return string
     */
    // https://www.vlaanderen.be/datavindplaats/catalogus/basisregister-van-alle-logies-in-vlaanderen
    public function defineEndpoint(): string
    {
        return '/sector/accommodation/base_registry.json';
    }

    public function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }

    public function defaultQuery(): array
    {
        return [
            'city' => $this->city,
            'limit' => $this->limit,
            'page' => $this->page
        ];
    }

    public function defaultConfig(): array
    {
        return [
            'timeout' => 120,
        ];
    }
}
