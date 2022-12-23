<?php

namespace Codana\DemoSaloonSdk\Responses;

use Codana\DemoSaloonSdk\Exceptions\DemoSaloonSdkRequestException;
use Sammyjo20\Saloon\Http\SaloonResponse;

class DemoSaloonSdkResponse extends SaloonResponse
{
    /**
     * Create an exception if a server or client error occurred.
     *
     * @return DemoSaloonSdkRequestException
     */
    public function toException(): DemoSaloonSdkRequestException
    {
        if ($this->failed()) {
            $body = $this->response?->getBody()?->getContents();

            return new DemoSaloonSdkRequestException($this, $body, 0, $this->getGuzzleException());
        }
    }
}
