<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClassModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Validation;
use Ramsey\Uuid\Uuid;

class DashboardClassController extends BaseController
{

    protected $model;
    public function __construct()
    {
        $this->model = new ClassModel();
    }
    public function index()
    {
        $data['title'] = 'E-Voting | Class Management';
        $data['classes'] = $this->model->findAll();
        return view('dashboard/class/index', $data);
    }

    public function store()
    {
        $data = [
            'id' => Uuid::uuid4()->toString(),
            'name' => $this->request->getVar('name'),
            'generation' => $this->request->getVar('generation'),
            'total' => $this->request->getVar('total')
        ];

        if (!$this->validateRequest()) {
            return redirect()->back()
                ->with('validationErrors', $this->validator->getErrors())
                ->with('error', 'Class has not been added')
                ->withInput();
        }

        $this->model->insert($data);
        return redirect()->to('/dashboard/classes')->with('success', 'Class has been added');
    }

    public function update()
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'generation' => $this->request->getVar('generation'),
            'total' => $this->request->getVar('total'),
        ];

        if (!$this->validateRequest()) {
            return redirect()->back()
                ->with('validationErrors', $this->validator->getErrors())
                ->with('error', 'Class has not been updated')
                ->withInput();
        }
        $this->model->update($this->request->getVar('id'), $data);
        return redirect()->to('/dashboard/classes')->with('success', 'Class has been updated');
    }

    public function delete()
    {
        $this->model->delete($this->request->getVar('id'));
        return redirect()->to('/dashboard/classes')->with('success', 'Class has been deleted');
    }

    private function validateRequest()
    {
        $rules = [
            'name' => 'required|min_length[3]',
            'generation' => 'required|is_natural_no_zero|exact_length[4]',
            'total' => 'required|is_natural_no_zero'
        ];

        return $this->validate($rules);
    }
}
