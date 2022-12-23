<?php

namespace Codana\DemoSaloonSdk;

use Codana\DemoSaloonSdk\Requests\LodgingsCollection;
use Codana\DemoSaloonSdk\Responses\DemoSaloonSdkResponse;
use Sammyjo20\Saloon\Http\SaloonConnector;
use Sammyjo20\Saloon\Traits\Plugins\AcceptsJson;

/**
 * @method LodgingsCollection lodgings
 */
class DemoSaloonSdk extends SaloonConnector
{
    use AcceptsJson;

    /**
     * Define the base URL for the API
     *
     * @var string
     */
    protected string $apiBaseUrl = 'https://opendata.visitflanders.org';

    /**
     * Custom response that all requests will return.
     *
     * @var string|null
     */
    protected ?string $response = DemoSaloonSdkResponse::class;

    /**
     * The requests/services on the ToerismeVlaanderenSdk.
     *
     * @var array
     * @method LodgingsCollection lodgings
     */
    protected array $requests = [
        'lodgings' => LodgingsCollection::class,
    ];

    /**
     * Define the base URL of the API.
     *
     * @return string
     */
    public function defineBaseUrl(): string
    {
        return $this->apiBaseUrl;
    }

    /**
     * @param string|null $baseUrl
     */
    public function __construct(string $baseUrl = null)
    {
        if (isset($baseUrl)) {
            $this->apiBaseUrl = $baseUrl;
        }
    }

    /**
     * Define any default headers.
     *
     * @return array
     */
    public function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }

    /**
     * Define any default config.
     *
     * @return array
     */
    public function defaultConfig(): array
    {
        return [
            'timeout' => 30,
        ];
    }
}
