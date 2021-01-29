<?php

namespace App\Models;

use CodeIgniter\Model;

class PromotionModel extends Model
{
    protected $table      = 'promotion';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'promotion_name', 'promotion_code', 'description', 'start_date', 'end_date', 'promotion_category', 'promotion_type', 'amount', 'maximum_amount', 'max_use', 'is_active'
    ];

    public function GetPromotion($searchPromotion = array())
    {
        $builder = $this->db->table('promotion');
        $builder->select('*');

        if (count($searchPromotion) > 0) {
            
            if (!empty($searchPromotion['promotion_code'])) {
                $builder->where('promotion_code', $searchPromotion['promotion_code'] ?? "");
            }
            
            if ($searchPromotion['start_date'] == true) {
                $builder->where('start_date <=', date('Y-m-d'));
                $builder->where('end_date >=', date('Y-m-d'));
            }
        }

        $builder->where('is_active', 1);

        $query = $builder->get();

        return $query->getResultArray();
    }

    public function checkPromotion($promotion_code, $customer_id)
    {
        $output = array();
        $data = [
            'promotion_code' => $promotion_code,
            'start_date' => true
		];

		$voucher = $this->GetPromotion($data);

		if (count($voucher) > 0) {
			$dataOrder = [
				'promotion_id' => $voucher[0]['id'],
				'customer_id' => $customer_id
			];
	
            $order_voucher = $this->getOrderWithPromotion($dataOrder);
            
            $output['data'] = count($order_voucher) < $voucher[0]->max_use ? $voucher[0] : '';
            $output['message'] = $output['data'] == '' ? 'Voucher melebihi batas pemakaian' : '';
		} else {
			$output['message'] = 'Kode Promosi tidak ditemukan';
        }
        
        return $output;
    }
}
