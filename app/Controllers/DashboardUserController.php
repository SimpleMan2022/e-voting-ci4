<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardUserController extends BaseController
{
    public function index()
    {
        $data['title'] = 'E-Voting | Dashboard Voters';
        return view('dashboard/user/index', $data);
    }
}
