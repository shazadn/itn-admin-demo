<?php

namespace App\Services\MyJsonApi;

class ApiP1 extends ApiRequest
{

    public function __construct()
    {
        $this->setApiUrl(config('services.apis.api1'));
        parent::__construct();
    }
}
