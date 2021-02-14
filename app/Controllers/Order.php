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
	protected $trackingOrderModel;
	protected $deliveryMethodeModel;
	protected $promotionModel;
	protected $ajaxOutput;
	protected $userModel;
	protected $pointTransactionModel;

	public function __construct()
	{
		$this->itemModel = model("itemModel");
		$this->addressModel = model("addressModel");
		$this->orderModel = model("orderModel");
		$this->orderDetailModel = model("orderDetailModel");
		$this->trackingOrderModel = model("trackingOrderModel");
		$this->deliveryMethodeModel = model("DeliveryMethodModel");
		$this->promotionModel = model("PromotionModel");
		$this->userModel = model('UserModel');
		$this->pointTransactionModel = model('PointTransactionModel');
		$this->ajaxOutput = new AjaxOutput();
	}

	public function index()
	{
		if (!logged_in() || !in_groups('Admin')) {
			return redirect()->to(site_url('/login'));
		} else {
			$data = [
				'title' => 'Order',
				'order_list' => $this->orderModel->getOrders()
			];

			return view('pages/admin/order', $data);
		}
	}

	public function track($id = 0)
	{
		if (!logged_in() || !in_groups('Customer')) {
			return redirect()->to(site_url('/login'));
		} else {
			$order = $this->orderModel->getDetail($id);
			$orderDetail = $this->orderDetailModel->getOrderDetail(['order_id' => $id]);
			$tracking = $this->trackingOrderModel->getOrderTrack($id);
			$data = [
				'title' => 'Lacak pesanan',
				'order' => $order,
				'orderDetail' => $orderDetail,
				'tracking' => $tracking,
				'operation' => 'track'
			];

			return view('order/track', $data);
		}
	}

	public function cancel($id = 0)
	{
		if (!logged_in() || !in_groups('Customer')) {
			return redirect()->to(site_url('/login'));
		}

		if ($id <> 0) {
			$order = $this->orderModel->getDetail($id);
			if ($order->status_id == "10") {
				$data = ['status_id' => 90];
				$this->orderModel->update($id, $data);
				$this->trackingOrderModel->save([
					'order_id' => $id,
					'status' => 90,
					'is_active' => 1,
					'updated_by' => user()->id,
					'updated_date' => date("Y-m-d H:i:s")
				]);

				return redirect()->to(site_url('/user/myorders'))->with('message', 'Pesanan dibatalkan');
			} else {
				return redirect()->to(site_url('/user/myorders'))->with('message', 'Pesanan tidak dapat dibatalkan karena sudah diproses');
			}
		} else {
			return redirect()->to(site_url('/user/myorders'))->with('message', 'Pesanan tidak valid');
		}
	}

	public function detail($id)
	{
		if (!logged_in()) {
			return redirect()->to(site_url('/login'));
		} else {
			$order = $this->orderModel->getDetail($id);
			if (!empty($order->id)) {
				$orderDetail = $this->orderDetailModel->getOrderDetail(['order_id' => $id]);
				if ($order->customer_id != user_id() && in_groups('Customer')) {
					return redirect()->to(site_url('/login'));
				}

				$data = [
					'title' => 'Detail pesanan',
					'order' => $order,
					'orderDetail' => $orderDetail,
					'operation' => 'payment'
				];

				return view('order/detail', $data);
			}
		}
	}

	public function create()
	{
		if (!logged_in() || !in_groups('Customer')) {
			return redirect()->to(site_url('/login'));
		} else {
			$delivery = $this->deliveryMethodeModel->where(['is_active' => 1, 'price >' => 0])->find();
			if (count($delivery) > 0) {
				$delivery = $delivery[0]['price'];
			} else {
				$delivery = 0;
			}
			$address = $this->addressModel->GetAddressByCustomer(user()->id);
			$data = [
				'title' => 'Buat pesanan',
				'address' => $address,
				'point' => user()->point,
				'delivery_fee' => $delivery,
			];

			return view('order/create', $data);
		}
	}

	public function getItem()
	{
		try {
			if ($this->request->isAJAX()) {
				$searchTerm = $this->request->getPost('searchTerm');

				$data = $this->itemModel->getItem(['item_name_1' => $searchTerm]);

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
				$redeem_code = $this->request->getPost('redeem_code');
				if (!empty($redeem_code)) {
					$promo = $this->promotionModel->checkPromotion($redeem_code, 'diskon', user_id());
					//check promotion code & return $promotion_id

					if (!empty($promo['data'])) {
						$promotion_id = $promo['data']['id'];
						$promoType = $promo['data']['promotion_type'];
						$promoMaximumAmount = $promo['data']['maximum_amount'];
						$promoAmount = $promo['data']['amount'];

						if ($promoType == "%") {
							$discount = floatval($gross_amount * $promoAmount / 100);
							$discount = intval($discount);
							if ($discount > $promoMaximumAmount) {
								$discount = $promoMaximumAmount;
							}
						} else {
							$discount = $promoAmount;
						}
					}
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
					$mypoint = user()->point;
					$delivery_fee = $this->request->getVar('delivery_fee');
					$point_used = 0;

					$net_amount = $gross_amount - $discount + $delivery_fee;

					if ($this->request->getVar("isUsePoint") == "1") {
						$point_used = $mypoint;
						if ($net_amount - $mypoint < 0) {
							$point_used = $net_amount;
						}
						if ($point_used < 0) {
							$point_used = 0;
						}
					} else {
						$point_used = 0;
					}

					$net_amount = $net_amount - $point_used;
					if ($net_amount < 0) {
						$net_amount = 0;
					}

					$payment_method_id = $this->request->getVar('payment_method_id');

					$status_pesanan = 10;
					//COD payment
					if ($payment_method_id == 1) {
						$status_pesanan = 15;
					} else if ($payment_method_id == 2) {
						if ($net_amount == 0) {
							$status_pesanan = 20;
						}
					}

					$orderNo = $this->orderModel->getOrderNo();
					$orderId = $this->orderModel->insert([
						'order_code' => $orderNo,
						'customer_id' => user()->id,
						'order_date' => date("Y-m-d H:i:s"),
						'promotion_id' => $promotion_id,
						'delivery_method_id' => $this->request->getVar('delivery_method_id'),
						'delivery_fee' => $delivery_fee,
						'gross_amount' => $gross_amount,
						'discount' => $discount,
						'point_used' => $point_used,
						'net_amount' => $net_amount,
						'address_id' => $address_id,
						'payment_method_id' => $payment_method_id,
						'status_id' => $status_pesanan,
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
					$this->trackingOrderModel->save([
						'order_id' => $orderId,
						'status' => $status_pesanan,
						'is_active' => 1,
						'updated_by' => user()->id,
						'updated_date' => date("Y-m-d H:i:s")
					]);

					/* update history point */
					if ($point_used > 0) {
						$this->pointTransactionModel->save([
							'user_id' => user_id(),
							'point' => -1 * $point_used,
							'order_id' => $orderId,
							'is_active' => 1,
							'transaction_date' => date("Y-m-d H:i:s")
						]);

						$updatedPoint = (int)user()->point - $point_used;
						$dataBalance = [
							'customer_id' => user_id(),
							'point' => $updatedPoint,
						];
						$this->userModel->updatePointBalance($dataBalance);
					}

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

	public function penilaian($id)
	{
		if (!logged_in() || !in_groups('Customer')) {
			return redirect()->to(site_url('/login'));
		} else {
			$order = $this->orderModel->getDetail($id);
			$orderDetail = $this->orderDetailModel->getOrderDetail(['order_id' => $id]);
			if ($order->customer_id != user_id()) {
				return redirect()->to(site_url('/login'));
			}

			$data = [
				'title' => 'Beri penilaian',
				'order' => $order,
				'orderDetail' => $orderDetail,
				'operation' => 'rating'
			];

			return view('order/rate', $data);
		}
	}

	public function savePenilaian()
	{
		$rules = [
			'rating' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Penilaian harus diisi.'
				]
			],
			'remarks' => [
				'rules' => 'required|min_length[50]',
				'errors' => [
					'required' => 'Komentar harus diisi.',
					'min_length' => 'Komentar minimal {param} karakter.'
				]
			]
		];

		if (!$this->validate($rules)) {
			return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
		} else {
			$this->orderModel->update($this->request->getVar('id'), [
				'remarks' => $this->request->getVar('remarks'),
				'rating' => $this->request->getVar('rating'),
				'review_date' => date("Y-m-d H:i:s"),
			]);
			return redirect()->to(site_url('/user/myorders'))->with('message', 'Pesanan sudah direview');
		}
	}

	public function payment($id)
	{
		if (!logged_in() || !in_groups('Customer')) {
			return redirect()->to(site_url('/login'));
		} else {
			$order = $this->orderModel->getDetail($id);
			$orderDetail = $this->orderDetailModel->getOrderDetail(['order_id' => $id]);
			if ($order->customer_id != user_id()) {
				return redirect()->to(site_url('/login'));
			}

			if ($order->status_id >= 20) {
				return redirect()->to(site_url('/user/myorders'));
			}
			$data = [
				'title' => 'Upload bukti pembayaran',
				'order' => $order,
				'orderDetail' => $orderDetail,
				'operation' => 'payment'
			];

			return view('order/payment', $data);
		}
	}

	public function uploadpayment()
	{
		$order_id = $this->request->getVar('id');
		$file = $this->request->getFile('proof_of_payment');
		if ($file->getSize() > 1048576) {
			return redirect()->back()->withInput()->with('errors', 'Ukuran file yang bisa diunggah maksimum 1Mb');
		};
		if ($file->isValid()) {
			if (!is_dir('files/orders/' . $order_id)) {
				mkdir('./files/orders/' . $order_id, 0777, TRUE);
				chmod('./files/orders/' . $order_id, 0755);
			}
			$newFileName = 'bukti_pembayaran_' . $order_id . '_' . date('Ymd_His') . '.' . $file->getExtension();

			if ($file->move('files/orders/' . $this->request->getVar('id') . '/', $newFileName, true)) {
				$data = ['id' => $order_id, 'proof_of_payment' => $newFileName, 'status_id' => 20];

				$this->orderModel->updatePayment($data);
				$this->trackingOrderModel->save([
					'order_id' => $order_id,
					'status' => 20,
					'is_active' => 1,
					'updated_by' => user()->id,
					'updated_date' => date("Y-m-d H:i:s")
				]);
			}
			return redirect()->to('/user/myorders')->withCookies()->with('message', 'Bukti pembayaran berhasil diupload');
		} else {
			return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
		}
	}

	public function redeem_point()
	{
		$data = [
			'title' => 'Penukaran Poin'
		];

		return view('order/redeem_point', $data);
	}

	public function updateStatus($id)
	{
		if (!logged_in() || !in_groups(['Admin', 'Kurir'])) {
			return redirect()->to(site_url('/login'));
		} else {
			$range = [];

			$order = $this->orderModel->getDetail($id);
			$from = 10;
			$to = 90;

			//COD & Delivery
			if ($order->payment_method_id == 1 && $order->delivery_method_id == 1) {
				$range = [15, 25, 30, 35, 40, 45, 55, 65, 70, 75, 90];
			}
			//COD - Self pickup
			else if ($order->payment_method_id == 1 && $order->delivery_method_id == 2) {
				$range = [15, 25, 30, 35, 40, 45, 50, 60, 75, 90];
			}
			//Bank - Delivery
			else if ($order->payment_method_id == 2 && $order->delivery_method_id == 1) {
				$range = [10, 20, 25, 30, 35, 40, 45, 55, 65, 70, 75, 90];
			}
			//Bank - Self pickup
			else if ($order->payment_method_id == 2 && $order->delivery_method_id == 2) {
				$range = [10, 20, 25, 30, 35, 40, 45, 50, 60, 75, 90];
			}

			if (in_groups('Kurir')) {
				$from = $order->status_id;
				$to = $order->status_id + 5;
			}

			$status = $this->orderModel->getStatusList($from, $to, $range);

			if (!empty($order->id)) {
				$orderDetail = $this->orderDetailModel->getOrderDetail(['order_id' => $id]);
				$data = [
					'title' => 'Update status pesanan',
					'order' => $order,
					'orderDetail' => $orderDetail,
					'status' => $status,
					'operation' => 'updatestatus'
				];

				return view('order/updatestatus', $data);
			}
		}
	}

	public function submitStatus()
	{
		if (!logged_in() || !in_groups(['Admin', 'Kurir'])) {
			return redirect()->to(site_url('/login'));
		} else {
			$order_id = $this->request->getVar('id');
			$order = $this->orderModel->find($order_id);
			$status = $this->request->getVar('status_id');

			$rules = [
				'status_id' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'Status pesanan harus diisi.'
					]
				],
			];
			if ($status == 35 && $order->delivery_method_id == 1) {
				$rules = [
					'proof_of_payment' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'Bukti pembayaran harus diupload.'
						]
					],
				];

				$file = $this->request->getFile('proof_of_payment');
				if ($file->getSize() > 1048576) {
					return redirect()->back()->withInput()->with('errors', 'Ukuran file yang bisa diunggah maksimum 1Mb');
				};
				if ($file->isValid()) {
					if (!is_dir('files/orders/' . $order_id)) {
						mkdir('./files/orders/' . $order_id, 0777, TRUE);
						chmod('./files/orders/' . $order_id, 0755);
					}
					$newFileName = 'bukti_pembayaran_' . $order_id . '_' . date('Ymd_His') . '.' . $file->getExtension();

					if ($file->move('files/orders/' . $this->request->getVar('id') . '/', $newFileName, true)) {
						$data = ['id' => $order_id, 'proof_of_payment' => $newFileName];

						$this->orderModel->updatePayment($data);
					}
				}
			}

			if ($this->validate($rules)) {
				/* update status pesanan */
				$this->orderModel->update($order_id, [
					'status_id' => $status,
				]);

				/* update track pesanan */
				$this->trackingOrderModel->save([
					'order_id' => $order_id,
					'status' => $status,
					'is_active' => 1,
					'updated_by' => user()->id,
					'updated_date' => date("Y-m-d H:i:s")
				]);

				if (in_groups('Admin')) {
					return redirect()->to(site_url('/admin'))->with('message', 'Status pesanan berhasil diupdate.');
				} else if (in_groups('Kurir')) {
					return redirect()->to(site_url('/courier'))->with('message', 'Status pesanan berhasil diupdate.');
				}
			} else {
				return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
			}
		}
	}
}
