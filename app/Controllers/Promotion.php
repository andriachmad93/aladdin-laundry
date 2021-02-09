<?php

namespace App\Controllers;

use App\Helpers\AjaxOutput;
use Exception;

class Promotion extends BaseController
{
	protected $promotionModel;
	protected $ajaxOutput;

	public function __construct()
	{
		$this->promotionModel = model('PromotionModel');
		$this->orderModel = model('OrderModel');
		$this->ajaxOutput = new AjaxOutput();
	}

	public function index()
	{
		if (!logged_in() || !in_groups(['Admin'])) {
			return redirect()->to(site_url('/login'));
		}

		$data = [
			'title' => 'Promosi',
			'promotion_list' => $this->promotionModel->GetPromotion()
		];

		return view('pages/admin/promotion', $data);
	}

	public function add_promotion_page()
	{
		if (!logged_in() || !in_groups(['Admin'])) {
			return redirect()->to(site_url('/login'));
		}

		$data = [
			'title' => 'Tambah Promosi'
		];

		return view('pages/admin/createpage/promotion', $data);
	}

	public function add_promotion()
	{
		if (!logged_in() || !in_groups(['Admin'])) {
			return redirect()->to(site_url('/login'));
		}

		$data = [
			'promotion_name' => $this->request->getPost('promotion_name'),
			'promotion_code' => $this->request->getPost('promotion_code'),
			'description' => $this->request->getPost('description'),
			'start_date' => $this->request->getPost('start_date'),
			'end_date' => $this->request->getPost('end_date'),
			'promotion_type' => $this->request->getPost('promotion_category') == 'poin' ? 'Rp' : $this->request->getPost('promotion_type'),
			'promotion_category' => $this->request->getPost('promotion_category'),
			'amount' => (int) $this->request->getPost('amount'),
			'maximum_amount' => (int) $this->request->getPost('maximum_amount'),
			'max_use' => (int) $this->request->getPost('max_use'),
			'is_active' => (int) $this->request->getPost('is_active')
		];

		$this->promotionModel->save($data);

		session()->setFlashdata('info', 'Data berhasil disimpan.');

		return redirect()->to('/promotion')->with('message', 'Data berhasil disimpan');
	}

	public function update_promotion_page($id)
	{
		if (!logged_in() || !in_groups(['Admin'])) {
			return redirect()->to(site_url('/login'));
		}

		$data = [
			'title' => 'Ubah Promosi',
			'promotion_detail' => $this->promotionModel->find($id)
		];

		return view('pages/admin/updatepage/promotion', $data);
	}

	public function update_promotion($id)
	{
		$data = [
			'promotion_name' => $this->request->getPost('promotion_name'),
			'promotion_code' => $this->request->getPost('promotion_code'),
			'description' => $this->request->getPost('description'),
			'start_date' => $this->request->getPost('start_date'),
			'end_date' => $this->request->getPost('end_date'),
			'promotion_type' => $this->request->getPost('promotion_category') == 'poin' ? 'Rp' : $this->request->getPost('promotion_type'),
			'promotion_category' => $this->request->getPost('promotion_category'),
			'amount' => (int) $this->request->getPost('amount'),
			'maximum_amount' => (int) $this->request->getPost('maximum_amount'),
			'max_use' => (int) $this->request->getPost('max_use'),
			'is_active' => (int) $this->request->getPost('is_active')
		];

		$this->promotionModel->update($id, $data);

		session()->setFlashdata('info', 'Data berhasil diubah.');

		return redirect()->to('/promotion')->with('message', 'Data berhasil diubah');
	}

	public function delete($id)
	{
		if (!logged_in() || !in_groups(['Admin'])) {
			return redirect()->to(site_url('/login'));
		}

		$this->promotionModel->update($id, ['is_active' => 0]);

		return redirect()->to('/promotion')->with('message', 'Data berhasil diubah');
	}

	public function getVoucherData($redeem_code)
	{
		if (!logged_in()) {
			throw new Exception('Unauthorized access.');
		}

		try {
			if ($this->request->isAJAX()) {
				if ($redeem_code == "")
					$data = "";
				else
					$data = $this->promotionModel->checkPromotion($redeem_code, 'diskon', user_id());

				$message = "";

				$status = 200;
				if (empty($data['data'])) {
					$message = $data['message'];
					$data = "";
					$status = 400;
				} else {
					$data = $data['data'];
				}

				$this->ajaxOutput->status = $status;
				$this->ajaxOutput->data = $data;
				$this->ajaxOutput->message = $message;
			}
		} catch (Exception $e) {
			$this->ajaxOutput->status = 500;
			$this->ajaxOutput->message = $e->getMessage();
		}
		echo json_encode($this->ajaxOutput);
	}
}
