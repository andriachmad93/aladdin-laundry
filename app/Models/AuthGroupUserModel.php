<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthGroupUserModel extends Model
{
    protected $table      = 'auth_group_users';
    protected $primaryKey = null;

    protected $allowedFields = [
        'group_id', 'user_id',
    ];
}
