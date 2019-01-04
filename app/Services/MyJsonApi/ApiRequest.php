<?php

namespace App\Services\MyJsonApi;

use App\Services\ApiRequest as BaseApiRequest;

class ApiRequest extends BaseApiRequest
{

    /**
     * Transform API response.
     * 
     * @param array|\stdClass
     * 
     * @return array
     */
    protected function transformResponse($response): array
    {
        $key = 'products';
        return is_array($response) ? $response[$key] : $response->{$key};
    }
}
