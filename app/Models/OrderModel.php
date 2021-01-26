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
        $sql = "select `order`.id, order_code, DATE_FORMAT(order_date,'%d %b %Y %H:%i:%s') as tanggal, order_date, net_amount, status_name, status_id,
        GROUP_CONCAT(CONCAT(`orderdetail`.quantity, ' ', `orderdetail`.uom, ' ', `item`.item_name) SEPARATOR ', ') detil
        from `order`
        left join `orderdetail`  ON `order`.id=`orderdetail`.order_id
        left join `item` ON item.id=`orderdetail`.item_id
        left join `status` ON `status`.id=`order`.status_id
        where `order`.customer_id=" . $customer_id . "
        group by `order`.id";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function getCustomers($authGroup = "")
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id=users.id', 'left');
        $builder->join('auth_groups', 'auth_groups.id=auth_groups_users.group_id', 'left');
        $builder->where('auth_groups.name', $authGroup);
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getDetail($order_id = "0")
    {
        $sql = "select `order`.id, order_code, DATE_FORMAT(order_date,'%d %b %Y %H:%i:%s') as tanggal, order_date, net_amount, delivery_method_id, deliverymethod.delivery_name, status_name,
            GROUP_CONCAT(CONCAT(`orderdetail`.quantity, ' ', `orderdetail`.uom, ' ', `item`.item_name) SEPARATOR ', ') detil,
            `address`.address_name,`address`.address, `address`.zip_code,
            `wilayah_kecamatan`.nama as kecamatan,
            `wilayah_kabupaten`.nama as kabupaten,
            `wilayah_provinsi`.nama as provinsi
        from `order`
        left join `orderdetail`  ON `order`.id=`orderdetail`.order_id
        left join `deliverymethod`  ON `order`.delivery_method_id=`deliverymethod`.id
        left join `item` ON item.id=`orderdetail`.item_id
        left join `status` ON `status`.id=`order`.status_id
        left join `address` ON `address`.id=`order`.address_id
        left join `wilayah_kecamatan` ON `wilayah_kecamatan`.id=`address`.district_id
        left join `wilayah_kabupaten` ON `wilayah_kabupaten`.id=`wilayah_kecamatan`.kabupaten_id
        left join `wilayah_provinsi` ON `wilayah_provinsi`.id=`wilayah_kabupaten`.provinsi_id
        where `order`.id=" . $order_id . "
        group by `order`.id";
        $query = $this->db->query($sql);
        return $query->getFirstRow();
    }

    public function getOrders($customerId = "")
    {
        $builder = $this->db->table('order');
        $builder->select('*');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getOrderTransaction()
    {
        $builder = $this->db->table('order');
        $builder->select('*');
        $builder->join('orderdetail', 'orderdetail.order_id=order.id', 'left');
        $builder->join('user', 'user.id=order.customer_id', 'left');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getOrderWithPromotion($searchOrderPromotion = array())
    {
        $builder = $this->db->table('order');
        $builder->select('*');

        if (count($searchOrderPromotion) > 0) {
            $builder->where('customer_id', $searchOrderPromotion['customer_id']);
            $builder->where('promotion_id', $searchOrderPromotion['promotion_id']);
            $builder->where('status_id !=', 90);
        }

        $query = $builder->get();
        
        return $query->getResultArray();
    }
}
