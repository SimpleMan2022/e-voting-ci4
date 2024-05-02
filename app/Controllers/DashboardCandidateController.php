<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardCandidateController extends BaseController
{
    public function index()
    {
        $data['title'] = 'E-Voting | Candidate Management';
        return view('dashboard/candidate/index', $data);
    }

    public function create()
    {
        $data['title'] = 'E-Voting | Add Candidate';
        return view('dashboard/candidate/create', $data);
    }
}
