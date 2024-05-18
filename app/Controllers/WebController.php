<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class WebController extends BaseController
{
    public function index()
    {
        return view('web/index');
    }
}
