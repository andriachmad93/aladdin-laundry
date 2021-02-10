<?php

namespace App\Models;

use Myth\Auth\Models\UserModel as MythModel;

class UserModel extends MythModel
{
    protected $returnType = 'App\Entities\User';

    protected $allowedFields = [
        'email', 'username', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
        'firstname', 'lastname', 'phone', 'default_address', 'date_of_birth', 'gender', 'photo', 'point'
    ];

    protected $validationRules = [
        'email'         => 'required|valid_email|is_unique[users.email,id,{id}]',
        'username'      => 'required|alpha_numeric_punct|min_length[3]|is_unique[users.username,id,{id}]',
        'password_hash' => 'required',
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

    public function getCustomer($customerId = "")
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getLoyalCustomer($customerId = "")
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->join('order', 'order.customer_id=user.id', 'left');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function updatePointBalance($data = [])
    {
        if (count($data) > 0) {
            $updateProperty = ['point' => $data['point']];
            $this->update($data['customer_id'], $updateProperty);
        }
    }

    public function getUserAccess($user_id = "")
    {
        $sql = "select agu.*, auth_groups.name, users.firstname, users.lastname
        from `auth_groups_users` as agu
        LEFT JOIN `users` ON `agu`.`user_id`=`users`.`id`
        LEFT JOIN `auth_groups` ON `agu`.`group_id`=`auth_groups`.`id`";

        if ($user_id) {
            $sql .= "where `agu`.`user_id` = '".$user_id."'";
        }

        $query = $this->db->query($sql);

        return $query->getResultArray();
    }
}
