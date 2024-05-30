<?php

namespace App\Models;

use CodeIgniter\Model;

class VoteModel extends Model
{
    protected $table            = 'votes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id', 'group_id', 'created_at', 'updated_at'
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
    public function getVotesWithGroup()
    {
        return $this->db->table('groups')
            ->select('groups.group_number, COUNT(votes.id) AS total_votes')
            ->join('votes', 'groups.id = votes.group_id', 'left')
            ->groupBy('groups.group_number')
            ->get()
            ->getResultArray();
    }

    public function getVotesWithResult()
    {
        $builder = $this->db->table('classes c');
        $builder->select('c.name AS class_name');
        $builder->select('COUNT(DISTINCT u.id) AS total_students');
        $builder->select('COALESCE(SUM(CASE WHEN v.group_id = "dfe9f6b3-de48-4b99-99ce-eb8ecbbe6a86" THEN 1 ELSE 0 END), 0) AS group_1_votes');
        $builder->select('COALESCE(SUM(CASE WHEN v.group_id = "65f799c2-324d-412e-96e1-6cd1bd8eb7b6" THEN 1 ELSE 0 END), 0) AS group_2_votes');
        $builder->join('users u', 'c.id = u.class_id', 'left');
        $builder->join('votes v', 'u.id = v.user_id', 'left');
        $builder->groupBy('c.name');
        $query = $builder->get();
        $results = $query->getResultArray();

        return $results;
    }
}
