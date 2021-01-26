<?php

namespace App\Models;

use CodeIgniter\Model;

class PromotionModel extends Model
{
    protected $table      = 'promotion';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'promotion_name', 'description', 'start_date', 'end_date', 'promotion_type', 'amount', 'maximum_amount', 'max_use', 'is_active'
    ];

    public function GetPromotion($searchPromotion = array())
    {
        $builder = $this->db->table('promotion');
        $builder->select('*');

        if (count($searchPromotion) > 0) {
            $builder->where('promotion_code', $searchPromotion['promotion_code']);
        }

        $query = $builder->get();

        return $query->getResultArray();
    }

    public function checkPromotion($promotion_code, $customer_id)
    {
        $output = array();
        $data = [
			'promotion_code' => $promotion_code
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
