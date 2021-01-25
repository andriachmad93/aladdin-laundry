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
}
