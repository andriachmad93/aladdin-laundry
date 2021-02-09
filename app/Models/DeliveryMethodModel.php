<?php

namespace App\Models;

use CodeIgniter\Model;

class TrackingOrderModel extends Model
{
    protected $table      = 'deliverymethod';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'delivery_name', 'price', 'is_active',
    ];

    protected $useTimestamps = false;
}
