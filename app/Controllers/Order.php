<?php

namespace App\Controllers;

use App\Helpers\AjaxOutput;
use Exception;

class Order extends BaseController
{
	protected $itemModel;
	protected $addressModel;
	protected $orderModel;
	protected $orderDetailModel;
	protected $ajaxOutput;

	public function __construct()
	{
		$this->itemModel = model("itemModel");
		$this->addressModel = model("addressModel");
		$this->orderModel = model("orderModel");
		$this->orderDetailModel = model("orderDetailModel");
		$this->ajaxOutput = new AjaxOutput();
	}

	public function index()
	{
		$data = [
			'title' => 'Order'
		];

		return view('pages/admin/order', $data);
	}

	public function create()
	{
		if (empty(user())) {
			return redirect()->to(site_url('/login'));
		} else {
			$address = $this->addressModel->GetAddressByCustomer(user()->id);
			$data = [
				'title' => 'Buat pesanan',
				'address' => $address,
				'point' => 12000,
			];

			return view('order/create', $data);
		}
	}

	public function getItem()
	{
		try {
			if ($this->request->isAJAX()) {
				$searchTerm = $this->request->getPost('searchTerm');

				$data = $this->itemModel->getItem($searchTerm);

				$output = [];
				foreach ($data as $d) {
					$item = [];
					$item['id'] = $d['id'];
					$item['text'] = $d['item_name'];
					array_push($output, $item);
				}


				$this->ajaxOutput->status = 200;
				$this->ajaxOutput->data = $output;
				$this->ajaxOutput->message = "";
			}
		} catch (Exception $e) {
			$this->ajaxOutput->status = 500;
			$this->ajaxOutput->message = $e->getMessage();
		}
		echo json_encode($this->ajaxOutput);
	}

	public function getItemDetail($id)
	{
		try {
			if ($this->request->isAJAX()) {

				$data = $this->itemModel->find($id);

				$this->ajaxOutput->status = 200;
				$this->ajaxOutput->data = $data;
				$this->ajaxOutput->message = "";
			}
		} catch (Exception $e) {
			$this->ajaxOutput->status = 500;
			$this->ajaxOutput->message = $e->getMessage();
		}
		echo json_encode($this->ajaxOutput);
	}

	public function submit()
	{
		try {
			$validation =  \Config\Services::validation();

			if ($this->request->isAJAX()) {
				$errors = [];

				$row_id = $this->request->getVar('row_id[]');
				$quantity = $this->request->getVar('quantity[]');
				$item_names = $this->request->getVar('item_name[]');
				$item_id = $this->request->getVar('item_id[]');
				$price = $this->request->getVar('price[]');
				$uom = $this->request->getVar('uom[]');
				$item_sub_total = [];

				$gross_amount = 0;

				if (!empty($row_id)) {

					foreach ($row_id as $ind => $val) {
						if (empty($item_id[$ind])) {
							$errors['item_id'] = "Barang harus diisi.";
						}
						if (empty($quantity[$ind])) {
							$errors['quantity'] = "Jumlah harus diisi.";
						}
						$price[$ind] = intval(str_replace(',', '', $price[$ind]));
						$quantity[$ind] = intval(str_replace(',', '', $quantity[$ind]));
						$item_sub_total[$ind] = $price[$ind] * $quantity[$ind];
						$gross_amount += $item_sub_total[$ind];
					}
				}

				$rules = [];
				$address_id = 0;
				if ($this->request->getVar('delivery_method_id') == "1") {
					$rules['address_id'] = [
						'rules' => 'required',
						'errors' => [
							'required' => 'Alamat harus diisi.',
						]
					];
					$address_id = $this->request->getVar('address_id');
				}

				$promotion_id = 0;
				$discount = 0;
				if (!empty($this->request->getPost('redeem_code'))) {
					//check promotion code & return $promotion_id
				}

				$rules['payment_method_id'] = [
					'rules' => 'required',
					'errors' => [
						'required' => 'Metode pembayaran harus diisi.',
					]
				];

				$this->validate($rules);

				$error_message = service('validation')->getErrors();
				if (!empty($errors)) {
					foreach ($errors as $key => $val) {
						$error_message[$key] = $val;
					}
				}

				if (!empty($error_message)) {
					$this->ajaxOutput->status = 400;
					$data = array('error' => $error_message);
					$this->ajaxOutput->data = json_encode($data);
				} else {
					$mypoint = 0;
					$point_used = 0;
					$net_amount = 0;

					if (($gross_amount - $discount) < $mypoint) {
						$point_used = $gross_amount - $discount;
					} else {
						$point_used = $mypoint;
					}
					$net_amount = $gross_amount - $discount - $point_used;

					$orderNo = $this->orderModel->getOrderNo();
					$orderId = $this->orderModel->insert([
						'order_code' => $orderNo,
						'customer_id' => user()->id,
						'order_date' => date("Y-m-d H:i:s"),
						'promotion_id' => $promotion_id,
						'delivery_method_id' => $this->request->getVar('delivery_method_id'),
						'gross_amount' => $gross_amount,
						'discount' => $discount,
						'point_used' => $point_used,
						'net_amount' => $net_amount,
						'address_id' => $address_id,
						'payment_method_id' => $this->request->getVar('payment_method_id'),
						'status_id' => 10,
						'proof_of_payment' => '',
						'is_active' => 1
					]);

					foreach ($item_id as $ind => $val) {
						$this->orderDetailModel->save([
							'order_id' => $orderId,
							'item_id' => $item_id[$ind],
							'quantity' => $quantity[$ind],
							'uom' => $uom[$ind],
							'price' => $price[$ind],
							'sub_total' => $item_sub_total[$ind],
							'is_active' => 1
						]);
					}

					/* update order track */

					/* update history point */

					$this->ajaxOutput->status = 200;
					$this->ajaxOutput->message = "Order " . $orderNo . " berhasil dibuat.";
					$this->ajaxOutput->data = "";
				}
			}
		} catch (Exception $e) {
			$this->ajaxOutput->status = 500;
			$this->ajaxOutput->message = $e->getMessage();
		}
		echo json_encode($this->ajaxOutput);
	}
}
