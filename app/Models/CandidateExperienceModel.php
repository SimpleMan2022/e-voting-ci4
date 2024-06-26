<?php

namespace App\Models;

use CodeIgniter\Model;
use IntlDateFormatter;

class CandidateExperienceModel extends Model
{
    protected $table            = 'candidate_details';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "id", "candidate_id", "experience", "description", "start", "end"
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getCandidateExperience()
    {
        setlocale(LC_TIME, 'id_ID.UTF-8');

        $candidateExperiences = $this->db->table('candidate_details')
            ->select('candidate_details.id, candidate_details.candidate_id, candidate_details.experience, candidate_details.description, candidate_details.start, candidate_details.end, candidates.name, candidates.nim, candidates.group_number_id, candidates.role, candidates.image')
            ->join('candidates', 'candidates.id = candidate_details.candidate_id')
            ->get()
            ->getResultArray();

        foreach ($candidateExperiences as &$experience) {
            $experience['start_month_year'] = $this->formatDateIndo($experience['start']);
            $experience['end_month_year'] = $this->formatDateIndo($experience['end']);
        }

        return $candidateExperiences;
    }
    private function formatDateIndo($date)
    {
        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::NONE, IntlDateFormatter::NONE);
        $formatter->setPattern('MMMM yyyy');
        $timestamp = strtotime($date);
        return $formatter->format($timestamp);
    }
}
