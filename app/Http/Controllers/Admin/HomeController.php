<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function home()
    {
        return view('admin.auth.welcome');
    }

}
