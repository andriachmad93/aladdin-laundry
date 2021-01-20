<?php

namespace App\Controllers;

class Promotion extends BaseController
{
	protected $promotionModel;

    public function __construct()
    {
        $this->promotionModel = model('PromotionModel');
	}
	
	public function index()
	{
		$data = [
			'title' => 'Promotion',
			'promotion_list' => $this->promotionModel->GetPromotion()
		];
		
		return view('pages/admin/promotion', $data);
	}

	public function add_promotion_page()
	{
		$data = [
			'title' => 'Tambah Promosi'
		];
		
		return view('pages/admin/createpage/promotion', $data);
	}

	public function add_promotion()
	{
		$data = [
			'promotion_name' => $this->request->getPost('promotion_name'),
			'description' => $this->request->getPost('description'),
			'start_date' => $this->request->getPost('start_date'),
			'end_date' => $this->request->getPost('end_date'),
			'promotion_type' => $this->request->getPost('promotion_type'),
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
		$data = [
			'title' => 'Ubah Promosi',
			'promotion_detail' => $this->promotionModel->find($id)
		];
		
		return view('pages/admin/updatepage/promotion', $data);
	}

	public function update_promotion()
	{
		session()->setFlashdata('info', 'Data berhasil disimpan.');

		return redirect()->to('/promotion')->with('message', 'Data berhasil disimpan');
	}
}
