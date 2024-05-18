<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CandidateExperienceModel;
use App\Models\CandidateModel;
use CodeIgniter\HTTP\ResponseInterface;
use Ramsey\Uuid\Uuid;

class DashboardCandidateExperienceController extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new CandidateExperienceModel();
    }
    public function index()
    {
        $data['title'] = 'E-Voting | Candidate Management';
        $data['candidates'] = $this->model->getCandidateExperience();
        return view('dashboard/candidate-experience/index', $data);
    }

    public function create()
    {
        $candidateModel = new CandidateModel();
        $data['title'] = 'E-Voting | Add Candidate Experience';
        $data['candidates'] = $candidateModel->findAll();
        return view('dashboard/candidate-experience/create', $data);
    }

    public function store()
    {
        $data = [
            'id' => Uuid::uuid4()->toString(),
            'candidate_id' => $this->request->getVar('candidate_id'),
            'description' => $this->request->getVar('description'),
            'experience' => $this->request->getVar('experience'),
            'start' => $this->request->getVar('start'),
            'end' => $this->request->getVar('end'),
        ];
        $experienceData = [];
        foreach ($data['experience'] as $index => $experience) {
            $experienceData[] = [
                'id' => Uuid::uuid4()->toString(),
                'candidate_id' => $data['candidate_id'],
                'experience' => $experience,
                'description' => $data['description'][$index],
                'start' => $data['start'][$index],
                'end' => $data['end'][$index],
            ];
        }

        if (!$this->validateRequest()) {
            return redirect()->to('/dashboard/candidates-experience/create')
                ->with('validationErrors', $this->validator->getErrors())
                ->with('error', 'Candidate experience has not been created')
                ->withInput();
        }

        $this->model->insertBatch($experienceData);

        return redirect()->to('/dashboard/candidates/experiences')->with('success', 'Candidate experience has been created');
    }


    public function edit($id)
    {
        $data['title'] = 'E-Voting | Edit Candidate Experience';
        $data['experience'] = $this->model->where('id', $id)->first();
        return view('dashboard/candidate-experience/edit', $data);
    }

    public function update($id)
    {
        $candidate =  $this->model->where('id', $id)->first();
        $data = [
            'candidate_id' => $candidate['candidate_id'],
            'experience' => $this->request->getVar('experience'),
            'description' => $this->request->getVar('description'),
            'start' => $this->request->getVar('start'),
            'end' => $this->request->getVar('end'),
        ];
        if (!$this->validateRequest()) {
            return redirect()->to('/dashboard/candidates/experiences/edit/' . $id)
                ->with('validationErrors', $this->validator->getErrors())
                ->with('error', 'Candidate experience has not been updated')
                ->withInput();
        }
        $this->model->update($id, $data);
        return redirect()->to('/dashboard/candidates/experiences')->with('success', 'Candidate experience has been updated');
    }

    public function delete($id)
    {
        $candidate = $this->model->where("id", $id)->first();
        $this->model->delete($id);
        return redirect()->to('/dashboard/candidates/experiences')->with('success', 'Candidates experience has been deleted');
    }

    private function validateRequest()
    {
        $rules = [
            'experience' => 'required',
            'start' => 'required',
            'end' => 'required',
        ];

        return $this->validate($rules);
    }
}
