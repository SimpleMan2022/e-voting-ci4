<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClassModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use Ramsey\Uuid\Uuid;

class DashboardUserController extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new UserModel();
    }
    public function index()
    {
        $classModel = new ClassModel();
        $data = [
            'title' => 'E-Voting | Dashboard Voters',
            'classes' => $classModel->findAll(),
            'voters' => $this->model->getVotersWithClass(),
        ];

        return view('dashboard/user/index', $data);
    }


    public function store()
    {

        $data = [
            'id' => Uuid::uuid4()->toString(),
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'class_id' => $this->request->getVar('class_id'),
            'is_admin' => 0,
        ];

        if (!$this->validateRequest()) {
            return redirect()->back()
                ->with('validationErrors', $this->validator->getErrors())
                ->with('error', 'User has not been created')
                ->withInput();
        }

        $this->model->insert($data);
        return redirect()->to('/dashboard/voters')->with('success', 'User has been created');
    }

    public function update()
    {

        $data = [
            'id' => $this->request->getVar('id'),
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'class_id' => $this->request->getVar('class_id'),
            'is_admin' => 0,
        ];
        dd($data);
        if (!$this->validateRequest()) {
            return redirect()->back()
                ->with('validationErrors', $this->validator->getErrors())
                ->with('error', 'User has not been updated')
                ->withInput();
        }

        $this->model->update($data['id'], $data);
        return redirect()->to('/dashboard/voters')->with('success', 'User has been updated');
    }

    private function validateRequest()
    {
        $rules = [
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]',
            'class_id' => 'required',
        ];

        return $this->validate($rules);
    }
}
