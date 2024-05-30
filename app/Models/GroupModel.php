<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupModel extends Model
{
    protected $table            = 'groups';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "id", "group_number", "group_image", "vision", "mission", "created_at", "updated_at"
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
    public function getAllCandidateByGroup()
    {
        $builder = $this->db->table('groups');
        $builder->select('groups.id AS group_id, groups.group_number, groups.group_image,groups.vision, groups.mission, GROUP_CONCAT(CASE WHEN c.role = \'ketua\' THEN c.name ELSE NULL END) AS ketua, GROUP_CONCAT(CASE WHEN c.role = \'wakil ketua\' THEN c.name ELSE NULL END) AS wakil');
        $builder->join('candidates c', 'groups.id = c.group_number_id');
        $builder->groupBy('groups.id, groups.group_number, groups.group_image');
        $builder->orderBy('groups.group_number');

        return $builder->get()->getResultArray();
    }
}
