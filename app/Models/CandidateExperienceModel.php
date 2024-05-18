<?php

namespace App\Models;

use CodeIgniter\Model;

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
        return $this->db->table('candidate_details')
            ->select('candidate_details.id, candidate_details.candidate_id, candidate_details.experience, candidate_details.description, candidate_details.start, candidate_details.end, candidates.name, candidates.nim, candidates.group_number_id, candidates.role, candidates.image')
            ->join('candidates', 'candidates.id = candidate_details.candidate_id')
            ->get()
            ->getResultArray();
    }
}
