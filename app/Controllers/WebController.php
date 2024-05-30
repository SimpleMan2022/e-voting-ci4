<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CandidateExperienceModel;
use App\Models\CandidateModel;
use App\Models\ClassModel;
use App\Models\GroupModel;
use App\Models\UserModel;
use App\Models\VoteModel;
use CodeIgniter\HTTP\ResponseInterface;
use DateTime;
use IntlDateFormatter;
use Ramsey\Uuid\Uuid;

class WebController extends BaseController
{
    protected $userModel;
    protected $class;
    protected $experienceModel;
    protected $candidateModel;
    protected $groupModel;
    protected $voteModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->class = new ClassModel();
        $this->candidateModel = new CandidateModel();
        $this->experienceModel = new CandidateExperienceModel();
        $this->groupModel = new GroupModel();
        $this->voteModel = new VoteModel();
    }
    public function index()
    {

        $data['title'] = 'Sistem Evoting | Home';
        $data['user'] = $this->userModel->where('name', session()->get('name'))->first();
        $data['candidateList'] = $this->groupModel->getAllCandidateByGroup();
        $data['candidateExperiences'] = $this->experienceModel->getCandidateExperience();
        $data['candidate'] = $this->candidateModel->limit(2)->find();
        $data['classCount'] = $this->class->countAll();
        $data['candidateCount'] = $this->candidateModel->countAll();
        $data['voterCount'] = $this->userModel->where('is_admin', 0)->countAllResults();
        foreach ($data['candidate'] as &$candidate) {
            $candidate['age'] = $this->calculateAge($candidate['birth_of_date']);
        }
        // dd($data['candidate']);
        // dd($data['candidateExperiences']);
        return view('web/index', $data);
    }
    private function calculateAge($birthdate)
    {
        $birthDate = new DateTime($birthdate);
        $currentDate = new DateTime();
        $age = $currentDate->diff($birthDate)->y;
        return $age;
    }

    public function vote()
    {
        $data['title'] = 'Sistem Evoting | Vote';
        $data['user'] = $this->userModel->where('name', session()->get('name'))->first();
        $data['candidateList'] = $this->groupModel->getAllCandidateByGroup();
        // dd($data['candidateList']);
        return view('web/vote', $data);
    }
    public function hasil()
    {
        $data['title'] = 'Sistem Evoting | Vote';
        $data['user'] = $this->userModel->where('name', session()->get('name'))->first();
        $data['candidateList'] = $this->groupModel->getAllCandidateByGroup();
        $data['votes'] = $this->voteModel->getVotesWithResult();

        return view('web/hasil', $data);
    }

    public function voteAction()
    {
        $user = $this->userModel->where('name', session()->get('name'))->first();
        if ($user['is_vote'] == 1) {
            return redirect()->to('/vote')->with('error', 'Anda sudah melakukan vote');
        }
        $data = [
            'id' => Uuid::uuid4()->toString(),
            'user_id' => session()->get('id'),
            'group_id' => $this->request->getVar('group'),
        ];

        $isVote = [
            'is_vote' => 1
        ];

        $this->voteModel->insert($data);
        $this->userModel->update($user['id'], $isVote);
        return redirect()->to('/vote')->with('success', 'Anda sudah melakukan vote, terima kasih');
    }
}
