<?php

namespace App\Models;

use Myth\Auth\Models\UserModel as MythModel;

class UserModel extends MythModel
{
    protected $returnType = 'App\Entities\User';

    protected $allowedFields = [
        'email', 'username', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
        'firstname', 'lastname', 'phone', 'default_address'
    ];

    protected $validationRules = [
        'email'         => 'required|valid_email|is_unique[users.email,id,{id}]',
        'username'      => 'required|alpha_numeric_punct|min_length[3]|is_unique[users.username,id,{id}]',
        'password_hash' => 'required',
        'firstname'     => 'required|alpha_numeric_punct|min_length[3]',
        'lastname'      => 'required|alpha_numeric_punct|min_length[3]',
        'phone'         => 'required|numeric|min_length[10]',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function updateDefaultAddress($id, $address)
    {
        return $this->save([
            'id' => $id,
            'default_address' => $address
        ]);
    }
}
