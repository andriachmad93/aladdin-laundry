<?php

namespace App\Controllers;

use DateTime;

class Report extends BaseController
{
	protected $orderModel;

	public function __construct()
	{
		$this->orderModel = model('OrderModel');
	}

	public function transactions($start_date = "", $end_date = "")
	{
		if (!logged_in() || !in_groups(['Owner'])) {
			return redirect()->to(site_url('/login'));
		}

		if (empty($start_date)) {
			$start_date = date('Y-m-d');
			$datetime = new DateTime($start_date);
			date_sub($datetime, date_interval_create_from_date_string("1 month"));
			$start_date = $datetime->format('Y-m-d');
		}

		if (empty($end_date))
			$end_date = date('Y-m-d');

		$data = [
			'title' => 'Transaksi',
			'order_list' => $this->orderModel->getOrderTransaction($start_date, $end_date),
			'start_date' => $start_date,
			'end_date' => $end_date,
		];

		return view('pages/admin/transaction', $data);
	}

	public function loyal_customers($type = "", $start_date = "", $end_date = "")
	{
		if (!logged_in() || !in_groups(['Owner'])) {
			return redirect()->to(site_url('/login'));
		}

		if (empty($start_date)) {
			$start_date = date('Y-m-d');
			$datetime = new DateTime($start_date);
			date_sub($datetime, date_interval_create_from_date_string("1 month"));
			$start_date = $datetime->format('Y-m-d');
		}

		if (empty($end_date))
			$end_date = date('Y-m-d');

		if (empty($type)) {
			$type = "volume";
		}

		$dataCustomers = $this->orderModel->getSummaryLoyalCustomer($type, $start_date, $end_date);

		$data = [
			'title' => 'Loyal Customers',
			'start_date' => $start_date,
			'end_date' => $end_date,
			'type' => $type,
			'customers' => $dataCustomers,
		];

		return view('pages/admin/loyal-customer', $data);
	}

	public function sales_trend($period = '')
	{
		if (!logged_in() || !in_groups(['Owner'])) {
			return redirect()->to(site_url('/login'));
		}

		if ($period == "") {
			$period = date("Y");
		}

		$data = [
			'title' => 'Tren Penjualan',
			'period' => $period,
			'graph_data' => json_encode($this->orderModel->getChartSalesTrend($period))
		];

		return view('pages/admin/sales-trend', $data);
	}

	public function customer_rating($start_date = "", $end_date = "")
	{
		if (!logged_in() || !in_groups(['Owner'])) {
			return redirect()->to(site_url('/login'));
		}
		$data_rating = [];
		if (empty($start_date)) {
			$start_date = date('Y-m-d');
			$datetime = new DateTime($start_date);
			date_sub($datetime, date_interval_create_from_date_string("1 month"));
			$start_date = $datetime->format('Y-m-d');
		}

		if (empty($end_date))
			$end_date = date('Y-m-d');

		$rating = $this->orderModel->getReportOrderRating($start_date, $end_date);

		/* get total */
		$total = 0;
		foreach ($rating as $r) {
			$total += $r['total'];
		}

		/* convert to highchart format */
		foreach ($rating as $r) {
			$_totalRating = number_format(($r['total'] / $total * 100), 2, '.', ',');
			$d = [
				'name' => 'Rating ' . $r['rating'],
				'y' => floatval($_totalRating)
			];
			array_push($data_rating, $d);
		}

		$data = [
			'title' => 'Penilaian Pelanggan',
			'start_date' => $start_date,
			'end_date' => $end_date,
			'rating' => json_encode($data_rating)
		];

		return view('pages/admin/customer-rating', $data);
	}
}
