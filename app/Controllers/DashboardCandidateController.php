<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CandidateModel;
use App\Models\GroupModel;
use CodeIgniter\HTTP\ResponseInterface;
use PHPUnit\Framework\Attributes\Group;
use Ramsey\Uuid\Uuid;

class DashboardCandidateController extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new CandidateModel();
    }
    public function index()
    {
        $data['title'] = 'E-Voting | Candidate Management';
        $data['candidates'] = $this->model->getCandidateGroup();
        return view('dashboard/candidate/index', $data);
    }

    public function create()
    {
        $groupModel = new GroupModel();
        $data['title'] = 'E-Voting | Add Candidate';
        $data['groups'] = $groupModel->findAll();
        return view('dashboard/candidate/create', $data);
    }

    public function store()
    {
        $data = [
            'id' => Uuid::uuid4()->toString(),
            'group_number_id' => $this->request->getVar('group_number_id'),
            'name' => $this->request->getVar('name'),
            'nim' => $this->request->getVar('nim'),
            'place_of_birth' => $this->request->getVar('place_of_birth'),
            'birth_of_date' => $this->request->getVar('birth_of_date'),
            'role' => $this->request->getVar('role'),
            'image' => $this->request->getFile('image'),
        ];
        if ($data['image']->isValid() && !$data['image']->hasMoved()) {
            $rules = [
                'image' => 'max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
            ];
            if (!$this->validate($rules)) {
                return redirect()->to('/dashboard/candidates/create')
                    ->with('validationErrors', $this->validator->getErrors())
                    ->with('error', 'Candidate has not been created')
                    ->withInput();
            }
            $filename = $data['image']->getRandomName();
            $data['image']->move(ROOTPATH . 'public/uploads/candidate', $filename);
            $data['image'] = $filename;
        }

        if (!$this->validateRequest()) {
            return redirect()->to('/dashboard/candidates/create')
                ->with('validationErrors', $this->validator->getErrors())
                ->with('error', 'Candidate has not been created')
                ->withInput();
        }
        $this->model->insert($data);
        return redirect()->to('/dashboard/candidates')->with('success', 'Candidate has been created');
    }

    public function edit($id)
    {
        $data['title'] = 'E-Voting | Edit Candidate';
        $data['candidate'] = $this->model->find($id);
        $groupModel = new GroupModel();
        $data['groups'] = $groupModel->findAll();
        return view('dashboard/candidate/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'group_number_id' => $this->request->getVar('group_number_id'),
            'name' => $this->request->getVar('name'),
            'nim' => $this->request->getVar('nim'),
            'place_of_birth' => $this->request->getVar('place_of_birth'),
            'birth_of_date' => $this->request->getVar('birth_of_date'),
            'role' => $this->request->getVar('role'),
            'image' => $this->request->getFile('image'),
        ];

        if (!$this->validateRequest()) {
            return redirect()->to('/dashboard/candidates/edit/' . $id)
                ->with('validationErrors', $this->validator->getErrors())
                ->with('error', 'Candidate has not been updated')
                ->withInput();
        }
        if ($data['image']->isValid() && !$data['image']->hasMoved()) {
            $rules = [
                'image' => 'max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
            ];
            if (!$this->validate($rules)) {
                return redirect()->to('/dashboard/candidates/edit/' . $id)
                    ->with('validationErrors', $this->validator->getErrors())
                    ->with('error', 'Candidate has not been updated')
                    ->withInput();
            }
            if (!empty($this->request->getVar("old_image"))) {
                unlink('uploads/candidate/' . $this->request->getVar("old_image"));
            }
            $filename = $data['image']->getRandomName();
            $data['image']->move(ROOTPATH . 'public/uploads/candidate', $filename);
            $data['image'] = $filename;
        }
        $this->model->update($id, $data);
        return redirect()->to('/dashboard/candidates')->with('success', 'Candidate has been updated');
    }

    public function delete($id)
    {
        $candidate = $this->model->where("id", $id)->first();
        if (!empty($candidate['image'])) {
            unlink('uploads/candidate/' . $candidate['image']);
        }
        $this->model->delete($id);
        return redirect()->to('/dashboard/candidates')->with('success', 'Candidates has been deleted');
    }

    private function validateRequest()
    {
        $rules = [
            "name" => "required|min_length[3]",
            "nim" => "required|min_length[9]",
            "place_of_birth" => "required|",
            "birth_of_date" => "required|",
            "role" => "required",
        ];

        return $this->validate($rules);
    }
}
