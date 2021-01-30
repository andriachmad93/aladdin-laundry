<?php

namespace App\Models;

use CodeIgniter\Model;

class PointTransactionModel extends Model
{
    protected $table      = 'pointtransaction';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id', 'order_id', 'remarks', 'promotion_id', 'type', 'point',
        'transaction_date', 'is_active',
    ];

    public function getPointHistory($customer_id)
    {
        $builder = $this->db->table($this->table);
        $builder->select(
            "pointtransaction.*,
            IFNULL(promotion_code,'') as promotion_code,
            IFNULL(order_code,'') as order_code",
            FALSE
        );
        $builder->join('promotion', 'promotion.id=pointtransaction.promotion_id', 'left');
        $builder->join('order', 'order.id=pointtransaction.order_id', 'left');
        $builder->where('user_id', $customer_id);
        $builder->where('pointtransaction.is_active', 1);
        $builder->orderBy('transaction_date', 'desc');
        $query = $builder->get();
        return $query->getResultArray();;
    }

    public function checkUseOfRedeem($data = [])
    {
        $this->where('user_id', $data['customer_id']);
        $this->where('promotion_id', $data['promotion_id']);
        return $this->findAll();
    }
}
