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
        $sql = "select * from item where is_active = 1";

        if (count($searchItem) > 0) {
            $sql .= " and (item_name like '%".$searchItem['item_name_1']."%'";

            if (isset($searchItem['item_name_2'])) {
                $sql .= "or item_name like '%".$searchItem['item_name_2']."%'";
            }

            $sql .= ")";
        }

        $query = $this->db->query($sql);

        return $query->getResultArray();
    }
}
