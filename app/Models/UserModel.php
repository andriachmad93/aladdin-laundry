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
        $builder = $this->db->table('address');
        $builder->select(
            'users.firstname,
            users.lastname,
            users.date_of_birth,
            users.gender,
            users.email,
            users.phone,
            users.created_at,
            address.*, 
            case when IFNULL(users.default_address,0)<>address.id then \'false\' else \'true\' end as default_address, 
            wilayah_kecamatan.nama as kecamatan,
            wilayah_kabupaten.nama as kabupaten,
            wilayah_provinsi.nama as provinsi',
            FALSE
        );
        $builder->join('users', 'users.id=address.customer_id');
        $builder->join('wilayah_kecamatan', 'wilayah_kecamatan.id=address.district_id', 'left');
        $builder->join('wilayah_kabupaten', 'wilayah_kabupaten.id=wilayah_kecamatan.kabupaten_id', 'left');
        $builder->join('wilayah_provinsi', 'wilayah_provinsi.id=wilayah_kabupaten.provinsi_id', 'left');
        $builder->orderBy('address.id', 'asc');
        $builder->where(['address.is_active' => 1]);
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

    public function getUserAccess($id = "")
    {
        $sql = "select agu.*, auth_groups.name, users.firstname, users.lastname, users.username
        from `auth_groups_users` as agu
        LEFT JOIN `users` ON `agu`.`user_id`=`users`.`id`
        LEFT JOIN `auth_groups` ON `agu`.`group_id`=`auth_groups`.`id`";

        if ($id) {
            $sql .= "where `agu`.`id` = '" . $id . "'";
        }

        $query = $this->db->query($sql);

        return $query->getResultArray();
    }
}
