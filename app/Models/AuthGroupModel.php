<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthGroupModel extends Model
{
    protected $table      = 'auth_groups';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name', 'description',
    ];

    public function getAuthGroup()
    {
        $builder = $this->db->table('auth_groups');
        $builder->select('*');
        $query = $builder->get();

        return $query->getResultArray();
    }
}
