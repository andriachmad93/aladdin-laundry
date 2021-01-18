<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressModel extends Model
{
    protected $table      = 'address';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'customer_id', 'address_name', 'receiver', 'receiver_phone', 'district_id', 'address', 'zip_code', 'is_active',
    ];

    public function AddressReachMaxUse($customer_id)
    {
        $builder = $this->db->table('address');
        $conditions = array('is_active' => 1, 'customer_id' => $customer_id);
        $builder->where($conditions);
        return $builder->countAllResults() >= 3;
    }

    public function GetKota($searchTerm = "")
    {
        $builder = $this->db->table('wilayah_kecamatan');
        $builder->select(
            'wilayah_kecamatan.id as id,
            concat(wilayah_provinsi.nama,\',\',wilayah_kabupaten.nama,\',\',wilayah_kecamatan.nama) as text',
            FALSE
        );
        $builder->join('wilayah_kabupaten', 'wilayah_kabupaten.id=wilayah_kecamatan.kabupaten_id', 'left');
        $builder->join('wilayah_provinsi', 'wilayah_provinsi.id=wilayah_kabupaten.provinsi_id', 'left');
        $builder->like('wilayah_kecamatan.nama', $searchTerm);
        $builder->orLike('wilayah_kabupaten.nama', $searchTerm);
        $builder->orLike('wilayah_provinsi.nama', $searchTerm);
        $builder->orderBy('text', 'asc');
        $query = $builder->get();
        return $query->getResultArray();;
    }

    public function GetAddressByCustomer($customer_id)
    {
        $builder = $this->db->table('address');
        $builder->select(
            'address.*, 
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
        $builder->where(['address.customer_id' => $customer_id, 'address.is_active' => 1]);
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getById($id)
    {
        $builder = $this->db->table('address');
        $builder->select(
            'address.*, 
            concat(wilayah_provinsi.nama,\',\',wilayah_kabupaten.nama,\',\',wilayah_kecamatan.nama) as nama_kota',
            FALSE
        );
        $builder->join('wilayah_kecamatan', 'wilayah_kecamatan.id=address.district_id', 'left');
        $builder->join('wilayah_kabupaten', 'wilayah_kabupaten.id=wilayah_kecamatan.kabupaten_id', 'left');
        $builder->join('wilayah_provinsi', 'wilayah_provinsi.id=wilayah_kabupaten.provinsi_id', 'left');
        $builder->where('address.id', $id);
        $query = $builder->get();

        return $query->getFirstRow();
    }

    public function DeleteAddress($id)
    {
        $this->save([
            'id' => $id,
            'is_active' => 0,
        ]);
    }
}
