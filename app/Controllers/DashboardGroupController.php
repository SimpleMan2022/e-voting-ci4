<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GroupModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Database;
use Ramsey\Uuid\Uuid;

class DashboardGroupController extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new GroupModel();
    }
    public function index()
    {
        $data['title'] = 'E-Voting | Group Management';
        $data['groups'] = $this->model->findAll();

        foreach ($data['groups'] as &$group) {
            $group['mission'] = implode(' ', array_slice(explode(' ', $group['mission']), 0, 5)) . ' ...';
        }

        return view('dashboard/group/index', $data);
    }


    public function store()
    {
        $data = [
            'id' => Uuid::uuid4()->toString(),
            'group_number' => $this->request->getVar('group_number'),
            'group_image' => $this->request->getFile('group_image'),
            'vision' => $this->request->getVar('vision'),
            'mission' => $this->request->getVar('mission'),
        ];


        if ($data['group_image']->isValid() && !$data['group_image']->hasMoved()) {
            $rules = [
                'group_image' => 'max_size[group_image,2048]|is_image[group_image]|mime_in[group_image,image/jpg,image/jpeg,image/gif,image/png]',
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()
                    ->with('validationErrors', $this->validator->getErrors())
                    ->with('error', 'Class has not been updated')
                    ->withInput();
            }
            $filename = $data['group_image']->getRandomName();
            $data['group_image']->move(ROOTPATH . 'public/uploads/group', $filename);
            $data['group_image'] = $filename;
        }

        if (!$this->validateRequest()) {
            return redirect()->back()
                ->with('validationErrors', $this->validator->getErrors())
                ->with('error', 'Class has not been updated')
                ->withInput();
        }
        $this->model->insert($data);
        return redirect()->to('/dashboard/groups')->with('success', 'Group has been added');
    }

    public function update()
    {
        $data = [
            'group_number' => $this->request->getVar('group_number'),
            'group_image' => $this->request->getFile('group_image'),
            'vision' => $this->request->getVar('vision'),
            'mission' => $this->request->getVar('mission'),
        ];

        if ($data['group_image']->isValid() && !$data['group_image']->hasMoved()) {
            $rules = [
                'group_image' => 'max_size[group_image,2048]|is_image[group_image]|mime_in[group_image,image/jpg,image/jpeg,image/gif,image/png]',
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()
                    ->with('validationErrors', $this->validator->getErrors())
                    ->with('error', 'Class has not been updated')
                    ->withInput();
            }
            if (!empty($this->request->getVar('old_group_image'))) {
                unlink('uploads/group/' . $this->request->getVar('old_group_image'));
            }
            $filename = $data['group_image']->getRandomName();
            $data['group_image']->move('uploads/group/', $filename);

            $data['group_image'] = $filename;
        } else {
            $data['group_image'] = $this->request->getVar('old_group_image');
        }

        if (!$this->validateRequest()) {
            return redirect()->back()
                ->with('validationErrors', $this->validator->getErrors())
                ->with('error', 'Class has not been updated')
                ->withInput();
        }
        $this->model->update($this->request->getVar('id'), $data);
        return redirect()->to('/dashboard/groups')->with('success', 'Class has been updated');
    }

    public function delete()
    {
        if (!empty($this->request->getVar('old_group_image'))) {
            unlink('uploads/group/' . $this->request->getVar('old_group_image'));
        }
        $this->model->delete($this->request->getVar('id'));
        return redirect()->to('/dashboard/groups')->with('success', 'Class has been deleted');
    }

    private function validateRequest()
    {
        $rules = [
            'group_number' => 'required|max_length[1]|numeric',
            'vision' => 'required|min_length[3]',
            'mission' => 'required|min_length[3]',
        ];

        return $this->validate($rules);
    }
}
