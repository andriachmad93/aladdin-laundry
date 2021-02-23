<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table      = 'order';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'order_code', 'customer_id', 'order_date', 'promotion_id', 'delivery_method_id', 'payment_method_id',
        'gross_amount', 'discount', 'net_amount', 'point_used', 'delivery_fee', 'proof_of_payment',
        'address_id', 'status_id', 'is_active', 'rating', 'review_date', 'remarks',
    ];

    protected $useTimestamps = false;

    public function getOnGoingPickupOrder($user_id)
    {
        $builder = $this->db->table('`order`');
        $builder->select("`order`.*, 
        trackingorder.order_id, 
        trackingorder.status, 
        trackingorder.updated_by, 
        trackingorder.updated_date, 
        address.customer_id,
        address.address_name,
        address.receiver,
        address.receiver_phone,
        address.district_id,
        address.address,
        address.zip_code,
        DATE_FORMAT(`order`.order_date,'%d %b %Y %H:%i:%s') as tanggal
        ");
        $builder->join('trackingorder', 'trackingorder.order_id=`order`.id and trackingorder.status=`order`.status_id
                        and trackingorder.id=(select id from trackingorder where trackingorder.order_id=`order`.id  and trackingorder.status=`order`.status_id order by updated_date desc limit 0,1)', 'left');
        $builder->join('address', 'address.id=`order`.address_id', 'left');
        $builder->where(array('`order`.is_active' => 1, '`order`.status_id' => 30, 'trackingorder.updated_by' => $user_id));
        $builder->orderBy('trackingorder.updated_date', 'desc');

        $query = $builder->get();
        $result = $query->getResultArray();
        foreach ($result as $key => $order) {
            $orderDetailModel = Model('OrderDetailModel');
            $orderDetails = $orderDetailModel->getOrderDetailByOrderId($order["id"]);
            $detail = "";
            $firstChar = "";
            foreach ($orderDetails as $orderDetail) {
                $detail .= "{$firstChar}{$orderDetail['detil']}";
                $firstChar = ", ";
            }
            $result[$key]["detil"] = $detail;
        }

        return $result;
    }

    public function getReadyPickupOrder()
    {
        $builder = $this->db->table('`order`');
        $builder->select("`order`.*, 
        trackingorder.order_id, 
        trackingorder.status, 
        trackingorder.updated_by, 
        trackingorder.updated_date, 
        address.customer_id,
        address.address_name,
        address.receiver,
        address.receiver_phone,
        address.district_id,
        address.address,
        address.zip_code,
        DATE_FORMAT(`order`.order_date,'%d %b %Y %H:%i:%s') as tanggal
        ");
        $builder->join('trackingorder', 'trackingorder.order_id=`order`.id and trackingorder.status=`order`.status_id
                        and trackingorder.id=(select id from trackingorder where trackingorder.order_id=`order`.id  and trackingorder.status=`order`.status_id order by updated_date desc limit 0,1)', 'left');
        $builder->join('address', 'address.id=`order`.address_id', 'left');
        $builder->where(array('`order`.is_active' => 1, '`order`.status_id' => 25));
        $builder->orderBy('trackingorder.updated_date', 'desc');

        $query = $builder->get();
        $result = $query->getResultArray();

        foreach ($result as $key => $order) {
            $orderDetailModel = Model('OrderDetailModel');
            $orderDetails = $orderDetailModel->getOrderDetailByOrderId($order["id"]);
            $detail = "";
            $firstChar = "";
            foreach ($orderDetails as $orderDetail) {
                $detail .= "{$firstChar}{$orderDetail['detil']}";
                $firstChar = ", ";
            }
            $result[$key]["detil"] = $detail;
        }

        return $result;
    }

    public function getOnGoingShippedOrder($user_id)
    {
        $builder = $this->db->table('`order`');
        $builder->select("`order`.*, 
        trackingorder.order_id, 
        trackingorder.status, 
        trackingorder.updated_by, 
        trackingorder.updated_date, 
        address.customer_id,
        address.address_name,
        address.receiver,
        address.receiver_phone,
        address.district_id,
        address.address,
        address.zip_code,
        DATE_FORMAT(`order`.order_date,'%d %b %Y %H:%i:%s') as tanggal
        ");
        $builder->join('trackingorder', 'trackingorder.order_id=`order`.id and trackingorder.status=`order`.status_id
        and trackingorder.id=(select id from trackingorder where trackingorder.order_id=`order`.id  and trackingorder.status=`order`.status_id order by updated_date desc limit 0,1)', 'left');
        $builder->join('address', 'address.id=`order`.address_id', 'left');
        $builder->where(array('`order`.is_active' => 1, '`order`.status_id' => 65, 'trackingorder.updated_by' => $user_id));
        $builder->orderBy('trackingorder.updated_date', 'desc');

        $query = $builder->get();
        $result = $query->getResultArray();
        foreach ($result as $key => $order) {
            $orderDetailModel = Model('OrderDetailModel');
            $orderDetails = $orderDetailModel->getOrderDetailByOrderId($order["id"]);
            $detail = "";
            $firstChar = "";
            foreach ($orderDetails as $orderDetail) {
                $detail .= "{$firstChar}{$orderDetail['detil']}";
                $firstChar = ", ";
            }
            $result[$key]["detil"] = $detail;
        }

        return $result;
    }

    public function getReadyShippedOrder()
    {
        $builder = $this->db->table('`order`');
        $builder->select("`order`.*, 
        trackingorder.order_id, 
        trackingorder.status, 
        trackingorder.updated_by, 
        trackingorder.updated_date, 
        address.customer_id,
        address.address_name,
        address.receiver,
        address.receiver_phone,
        address.district_id,
        address.address,
        address.zip_code,
        DATE_FORMAT(`order`.order_date,'%d %b %Y %H:%i:%s') as tanggal
        ");
        $builder->join('trackingorder', 'trackingorder.order_id=`order`.id and trackingorder.status=`order`.status_id
                        and trackingorder.id=(select id from trackingorder where trackingorder.order_id=`order`.id  and trackingorder.status=`order`.status_id order by updated_date desc limit 0,1)', 'left');
        $builder->join('address', 'address.id=`order`.address_id', 'left');
        $builder->where(array('`order`.is_active' => 1, '`order`.status_id' => 55));
        $builder->orderBy('trackingorder.updated_date', 'desc');

        $query = $builder->get();
        $result = $query->getResultArray();
        foreach ($result as $key => $order) {
            $orderDetailModel = Model('OrderDetailModel');
            $orderDetails = $orderDetailModel->getOrderDetailByOrderId($order["id"]);
            $detail = "";
            $firstChar = "";
            foreach ($orderDetails as $orderDetail) {
                $detail .= "{$firstChar}{$orderDetail['detil']}";
                $firstChar = ", ";
            }
            $result[$key]["detil"] = $detail;
        }

        return $result;
    }

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
        $sql = "select `order`.id, order_code, DATE_FORMAT(order_date,'%d %b %Y %H:%i:%s') as tanggal, order_date, net_amount, status_name, status_id, rating, remarks, review_date,
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
        $sql = "select `order`.id, order_code, DATE_FORMAT(order_date,'%d %b %Y %H:%i:%s') as tanggal, order_date, 
            gross_amount, discount, delivery_fee, point_used, net_amount, payment_method_id,
            delivery_method_id,  deliverymethod.delivery_name, status_id, status_name, `order`.customer_id, proof_of_payment, rating, review_date, remarks,
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
        $sql = "select o.*, status.status_name, users.firstname, users.lastname
        from `order` as o
        LEFT JOIN `status` ON `o`.`status_id`=`status`.`id`
        LEFT JOIN `users` ON `o`.`customer_id`=`users`.`id`";

        $query = $this->db->query($sql);

        return $query->getResultArray();
    }

    public function getOrderTransaction($start_date = "", $end_date = "")
    {
        $sql = "select o.*, status.status_name, users.firstname, users.lastname
        from `order` as o
        LEFT JOIN `status` ON `o`.`status_id`=`status`.`id`
        LEFT JOIN `users` ON `o`.`customer_id`=`users`.`id`";

        if ($start_date && $end_date) {
            $sql .= "where cast(o.order_date as DATE) between '" . $start_date . "' and '" . $end_date . "'";
        }

        $query = $this->db->query($sql);

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

    public function updatePayment($data)
    {
        $this->update($data['id'], $data);
    }

    public function getStatusList($from, $to, $range)
    {
        $builder = $this->db->table('status');
        $builder->select('*');
        $builder->where('id >=', $from);
        $builder->where('id <=', $to);
        $builder->whereIn('id', $range);
        $builder->orderBy('id');

        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getReportOrderRating($start_date, $end_date)
    {
        $sql = "select rating,count(1) as total from `order` 
            where status_id=75 and IFNULL(rating,0)>0 ";

        if ($start_date && $end_date) {
            $sql .= "and cast(order_date as DATE) between '" . $start_date . "' and '" . $end_date . "' ";
        }

        $sql .= "group by rating";

        $query = $this->db->query($sql);

        return $query->getResultArray();
    }

    public function getReportOrderRatingDetail($start_date, $end_date)
    {
        $sql = "select o.*, u.firstname, u.lastname from `order` o
            left join users u ON u.id=o.customer_id
            where status_id=75 and IFNULL(rating,0)>0 ";

        if ($start_date && $end_date) {
            $sql .= "and cast(order_date as DATE) between '" . $start_date . "' and '" . $end_date . "' ";
        }
        $sql .= "order by order_date desc";

        $query = $this->db->query($sql);

        return $query->getResultArray();
    }

    public function getSummaryLoyalCustomer($type, $start_date, $end_date)
    {
        if ($type == "count") {
            $sql = "select u.firstname, u.lastname, total from(
                select customer_id, count(1) as total 
                from `order` 
                where status_id=75 ";

            if ($start_date && $end_date) {
                $sql .= "and cast(order_date as DATE) between '" . $start_date . "' and '" . $end_date . "' ";
            }

            $sql .= "group by customer_id
                ) x
                left join users u ON u.id=x.customer_id
                order by total desc
                limit 10";
        } else if ($type == "volume") {
            $sql = "select u.firstname, u.lastname, total from(
                select customer_id, SUM(net_amount) as total 
                from `order` 
                where status_id=75 ";

            if ($start_date && $end_date) {
                $sql .= "and order_date between '" . $start_date . "' and '" . $end_date . "' ";
            }

            $sql .= "group by customer_id
            ) x
            left join users u ON u.id=x.customer_id
            order by total desc
            limit 10";
        }
        $query = $this->db->query($sql);

        return $query->getResultArray();
    }

    public function getChartSalesTrend($period = "")
    {
        $previous_period = 0;
        if ($period)
            $previous_period = $period - 1;

        $data[$previous_period] = $this->getTrend($previous_period);
        $data[$period] = $this->getTrend($period);

        $output = [
            [
                'name' => "1 Jan " . $previous_period . " - 31 Dec " . $previous_period,
                'marker' => ['symbol' => 'square'],
                'data' => $data[$previous_period],
            ],
            [
                'name' => "1 Jan " . $period . " - 31 Dec " . $period,
                'marker' => ['symbol' => 'diamond'],
                'data' => $data[$period],
            ],
        ];

        return $output;
    }

    public function getTrend($period = "")
    {
        $sql = "select YEAR(order_date) as Period, 
                sum(IF(MONTH(order_date)=1, net_amount, 0)) as M01,
                sum(IF(MONTH(order_date)=2, net_amount, 0)) as M02,
                sum(IF(MONTH(order_date)=3, net_amount, 0)) as M03,
                sum(IF(MONTH(order_date)=4, net_amount, 0)) as M04,
                sum(IF(MONTH(order_date)=5, net_amount, 0)) as M05,
                sum(IF(MONTH(order_date)=6, net_amount, 0)) as M06,
                sum(IF(MONTH(order_date)=7, net_amount, 0)) as M07,
                sum(IF(MONTH(order_date)=8, net_amount, 0)) as M08,
                sum(IF(MONTH(order_date)=9, net_amount, 0)) as M09,
                sum(IF(MONTH(order_date)=10, net_amount, 0)) as M10,
                sum(IF(MONTH(order_date)=11, net_amount, 0)) as M11,
                sum(IF(MONTH(order_date)=12, net_amount, 0)) as M12
            from `order` 
            where status_id=75
            and YEAR(order_date) = " . $period . "
            group by YEAR(order_date)
            order by YEAR(order_date)";

        $query = $this->db->query($sql);

        $data = $query->getResultArray();
        $arr = [];
        if (count($data) > 0) {
            foreach ($data as $a) {
                $arr = [
                    intval($a["M01"]), intval($a["M02"]), intval($a["M03"]),
                    intval($a["M04"]), intval($a["M05"]), intval($a["M06"]),
                    intval($a["M07"]), intval($a["M08"]), intval($a["M09"]),
                    intval($a["M10"]), intval($a["M11"]), intval($a["M12"]),
                ];
            }
        } else {
            $arr = [
                0, 0, 0,
                0, 0, 0,
                0, 0, 0,
                0, 0, 0,
            ];
        }
        return $arr;
    }
}
