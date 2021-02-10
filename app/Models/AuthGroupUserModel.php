<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthGroupUserModel extends Model
{
    protected $table      = 'auth_groups_users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'group_id', 'user_id',
    ];

    public function updateUserGroup($id, $group_id)
    {
        $data = array(
            'group_id' => $group_id
        );
        $this->set($data);
        $this->where('user_id', $id);
        $this->update('auth_groups_users');
    }
}
