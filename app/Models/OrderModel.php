<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table      = 'order';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'order_code', 'customer_id', 'order_date', 'promotion_id', 'delivery_method_id',
        'gross_amount', 'discount', 'net_amount', 'point_used',
        'address_id', 'status_id', 'is_active',
    ];

    protected $useTimestamps = true;

    public function getOrderNo()
    {
        /* prefix: ALD/yyyy/xxxxx
            ALD/2021/00001 
        */
        $sql = "select CONCAT('ALD/',CONVERT(year(curdate()),CHAR),'/',LPAD(seqNo,5,'0')) as OrderNo from(
            select IFNULL(MAX(CAST(RIGHT(order_code,5) AS DECIMAL)),0)+1 as seqNo from `order`
            where year(order_date)=year(curdate())
            )x";
        $query = $this->db->query($sql);
        return $query->getFirstRow()->OrderNo;
    }
}
