<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\MyJsonApi\ApiP1;
use App\Services\MyJsonApi\ApiP2;
use Illuminate\View\View;

class ProductsController extends Controller
{

    /**
     * Display products page.
     * 
     * @return View
     */
    public function products(): View
    {
        return view('admin.products', ['products' => array_merge(
            (new ApiP1())->getResponse(),
            (new ApiP2())->getResponse()
        )]);
    }
}
