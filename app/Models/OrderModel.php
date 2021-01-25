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

    protected $useTimestamps = false;

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

    public function getMyOrders($customer_id = "0")
    {
        $sql = "select `order`.id, order_code, DATE_FORMAT(order_date,'%d %b %Y %H:%i:%s') as tanggal, order_date, net_amount, status_name,
        GROUP_CONCAT(CONCAT(`orderdetail`.quantity, ' ', `orderdetail`.uom, ' ', `item`.item_name) SEPARATOR ', ') detil
        from `order`
        left join `orderdetail`  ON `order`.id=`orderdetail`.order_id
        left join `item` ON item.id=`orderdetail`.item_id
        left join `status` ON `status`.id=`order`.status_id
        where `order`.customer_id=" . $customer_id . "
        group by order_code, order_date, net_amount, status_id";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }
}
