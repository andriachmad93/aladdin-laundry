<?php

namespace App\Controllers;

class Item extends BaseController
{
	protected $itemModel;

    public function __construct()
    {
        $this->itemModel = model('ItemModel');
    }

	public function index()
	{
		if (!logged_in() || !in_groups(['Admin'])) {
			return redirect()->to(site_url('/login'));
		} else {
			$data = [
				'title' => 'Layanan',
				'item_list' => $this->itemModel->GetItem()
			];
			
			return view('pages/admin/item', $data);
		}
	}

	public function add_item_page()
	{
		if (!logged_in() || !in_groups(['Admin'])) {
			return redirect()->to(site_url('/login'));
		} else {
			$data = [
				'title' => 'Tambah Layanan'
			];
			
			return view('pages/admin/createpage/item', $data);
		}
	}

	public function add_item()
	{
		if (!logged_in() || !in_groups(['Admin'])) {
			return redirect()->to(site_url('/login'));
		} else {
			// Membuat array collection yang disiapkan untuk insert ke table
			$data = [
				'item_name' => $this->request->getPost('item_name'),
				'uom' => $this->request->getPost('uom'),
				'price' => (float) $this->request->getPost('price'),
				'is_active' => (int) $this->request->getPost('is_active')
			];

			$this->itemModel->save($data);

			session()->setFlashdata('info', 'Data berhasil disimpan.');

			return redirect()->to('/item')->with('message', 'Data berhasil disimpan');
		}
	}

	public function update_item_page($id)
	{
		if (!logged_in() || !in_groups(['Admin'])) {
			return redirect()->to(site_url('/login'));
		}

		$data = [
			'title' => 'Ubah Layanan',
			'item_detail' => $this->itemModel->find($id)
		];
		
		return view('pages/admin/updatepage/item', $data);
	}

	public function update_item($id)
	{
		if (!logged_in() || !in_groups(['Admin'])) {
			return redirect()->to(site_url('/login'));
		}

		$data = [
			'item_name' => $this->request->getPost('item_name'),
			'uom' => $this->request->getPost('uom'),
			'price' => (float) $this->request->getPost('price'),
			'is_active' => (int) $this->request->getPost('is_active')
		];

		$this->itemModel->update($id, $data);

		session()->setFlashdata('info', 'Data berhasil diubah.');

		return redirect()->to('/item')->with('message', 'Data berhasil diubah');
	}

	public function delete($id)
	{
		if (!logged_in() || !in_groups(['Admin'])) {
			return redirect()->to(site_url('/login'));
		}
		
		$data = [
			'is_active' => 0
		];

		$this->itemModel->update($id, $data);

		return redirect()->to('/item')->with('message', 'Data berhasil dihapus');
	}
}
