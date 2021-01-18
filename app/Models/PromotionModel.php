<?php

namespace App\Models;

use CodeIgniter\Model;

class PromotionModel extends Model
{
    protected $table      = 'promotion';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'promotion_name', 'description', 'start_date', 'end_date', 'promotion_type', 'amount', 'maximum_amount', 'max_use', 'is_active'
    ];

    public function GetPromotion($searchPromotion = "")
    {
        $builder = $this->db->table('promotion');
        $builder->select('*');
        $query = $builder->get();

        return $query->getResultArray();
    }
}
