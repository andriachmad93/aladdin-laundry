<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetailModel extends Model
{
    protected $table      = 'orderdetail';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'order_id', 'item_id', 'quantity', 'uom', 'price',
        'sub_total', 'is_active',
    ];

    protected $useTimestamps = false;

    public function getOrderDetailByOrderId($order_id){
        $builder = $this->db->table('orderdetail');
        $builder->select("CONCAT(orderdetail.quantity, ' ', orderdetail.uom, ' ', item.item_name) as detil");
        $builder->join('item', 'item.id=`orderdetail`.item_id', 'left');
        $builder->where(array('order_id' => $order_id));
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getOrderDetail($criteria = [])
    {
        $builder = $this->db->table('orderdetail');
        $builder->select('orderdetail.*, item.item_name');
        $builder->join('item', 'item.id=orderdetail.item_id', 'left');
        foreach ($criteria as $key => $val) {
            $builder->where($key, $val);
        }
        $builder->orderBy('orderdetail.id', 'asc');
        return $builder->get()->getResultArray();
    }
}
