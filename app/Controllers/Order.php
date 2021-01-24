<?php

namespace App\Controllers;

use App\Helpers\AjaxOutput;
use Exception;

class Order extends BaseController
{
	protected $itemModel;
	protected $addressModel;
	protected $orderModel;
	protected $ajaxOutput;

	public function __construct()
	{
		$this->itemModel = model("itemModel");
		$this->addressModel = model("addressModel");
		$this->orderModel = model("orderModel");
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
		$address = $this->addressModel->GetAddressByCustomer(user()->id);
		$data = [
			'title' => 'Buat pesanan',
			'address' => $address
		];

		return view('order/create', $data);
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
				$row_id = $this->request->getVar('row_id[]');
				var_dump($_POST['row_id']);

				if (!empty($_POST['quantity'])) {
					$validation->setRules(['quantity[]' => [
						'rules' => 'required|min_length[3]',
						'errors' => [
							'required' => 'Jumlah harus diisi.',
							'min_length' => 'Jumlah minimal {param} karakter.',
						]
					]]);
					//'quantity[]', 'Quantity', "required", ['required' => 'Jumlah harus diisi.']);
				}
				$validation->run();
				var_dump(service('validation')->getErrors());
				exit();
				$quantity = $this->request->getVar('quantity[]');
				$item_names = $this->request->getVar('item_name[]');
				$item_id = $this->request->getVar('item_id[]');

				foreach ($row_id as $ind => $val) {
					$qty = $quantity[$ind];
					$item_name = $item_names[$ind];
					$validation->setRule("quantity[" . $ind . "]", "Quantity", "required", ['required' => 'Jumlah ' . strtolower($item_name) . ' harus diisi.']);
					$validation->setRule("item_id[" . $ind . "]", "Quantity", "required", ['required' => 'Barang pada baris ke-' . $ind . ' harus diisi.']);
				}

				$validation->run();

				//$this->validator->setRule("quantity[]", "Quantity", "min_length[3]");
				//$this->validator->setRule();
				/*$this->validate([
					'quantity' => [
						'rules' => 'required|min_length[3]',
						'errors' => [
							'required' => 'Jumlah harus diisi.',
							'min_length' => 'Jumlah minimal {param} karakter.',
						]
					]
				]);*/
				var_dump(service('validation')->getErrors());
				//var_dump($this->request->getVar());
				exit();

				$this->ajaxOutput->status = 200;
				$this->ajaxOutput->data = "";
				$this->ajaxOutput->message = "";
			}
		} catch (Exception $e) {
			$this->ajaxOutput->status = 500;
			$this->ajaxOutput->message = $e->getMessage();
		}
		echo json_encode($this->ajaxOutput);
	}
}
