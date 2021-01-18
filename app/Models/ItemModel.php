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

    public function GetItem($searchItem = "")
    {
        $builder = $this->db->table('item');
        $builder->select('*');
        $query = $builder->get();

        return $query->getResultArray();
    }
}
