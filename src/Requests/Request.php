<?php

namespace Codana\DemoSaloonSdk\Requests;

use Codana\DemoSaloonSdk\DemoSaloonSdk;
use Sammyjo20\Saloon\Http\SaloonRequest;

class Request extends SaloonRequest
{
    /**
     * @var string|null
     */
    protected ?string $connector = DemoSaloonSdk::class;
}
