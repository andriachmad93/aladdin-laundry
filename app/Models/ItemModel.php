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

    public function GetItem($searchItem = array(), $is_active = "1")
    {
        $builder = $this->db->table('item');
        $builder->select('*');
        
        if (count($searchItem) > 0) {
            $builder->like('item_name', $searchItem['item_name_1']);
        }

        $builder->where('is_active', $is_active);
        $query = $builder->get();

        return $query->getResultArray();
    }
}
