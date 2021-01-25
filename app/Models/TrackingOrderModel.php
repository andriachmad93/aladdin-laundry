<?php

namespace App\Models;

use CodeIgniter\Model;

class TrackingOrderModel extends Model
{
    protected $table      = 'trackingorder';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'order_id', 'status', 'updated_by', 'update_date', 'is_active',
    ];

    protected $useTimestamps = false;

    public function getOrderTrack($order_id = 0)
    {
        $builder = $this->db->table('trackingorder');
        $builder->select(
            'trackingorder.*, status_name',
            FALSE
        );
        $builder->join('status', 'trackingorder.status=status.id', 'left');
        $conditions = array('is_active' => 1, 'order_id' => $order_id);
        $builder->where($conditions);
        $builder->orderBy('updated_date', 'desc');
        $query = $builder->get();

        return $query->getResultArray();
    }
}
