<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table      = 'item';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'item_name', 'uom', 'price', 'is_active'
    ];

    public function GetItem($searchItem = "", $is_active = "1")
    {
        $builder = $this->db->table('item');
        $builder->select('*');
        $builder->like('item_name', $searchItem);
        $builder->where('is_active', $is_active);
        $query = $builder->get();

        return $query->getResultArray();
    }
}
