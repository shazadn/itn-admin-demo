<?php

namespace App\Services\MyJsonApi;

class ApiP2 extends ApiRequest
{

    public function __construct()
    {
        $this->setApiUrl(config('services.apis.api2'));
        parent::__construct();
    }
}
