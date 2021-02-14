<?php

namespace App\Controllers;

class Pages extends BaseController
{
    protected $promotionModel;
    protected $itemModel;

    public function __construct() {
        $this->promotionModel = model('PromotionModel');
        $this->itemModel = model('ItemModel');
    }

    public function index()
    {
        $data = [
            'title' => 'Tentang kami'
        ];
        return view('pages/about', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'Tentang kami'
        ];
        return view('pages/about', $data);
    }

    public function faq()
    {
        $data = [
            'title' => 'Faq'
        ];
        return view('pages/faq', $data);
    }

    public function layanan($subName = "")
    {
        $title = "";
        $view = "";

        switch($subName) {
            case 'stroller-dan-babycare': 
                $title = 'Stroller dan Baby Care';
                $view = 'stroller_babycare';
                break;

            case 'sepatu-dan-tas': 
                $title = 'Sepatu dan Tas';
                $view = 'sepatu_tas';
                break;

            case 'helm': 
                $title = 'Helm';
                $view = 'helm';
                break;
            
            case 'satuan': 
                $title = 'Satuan';
                $view = 'satuan';
                break;

            case 'cuci-karpet-kantor': 
                $title = 'Cuci Karpet Kantor';
                $view = 'cuci_karpet_kantor';
                break;

            case 'cuci-sofa-dan-springbed': 
                $title = 'Cuci Sofa & Springbed';
                $view = 'cuci_sofa_springbed';
                break;
            
            default:
                break;
        }

        $data = [
            'title' => $title,
        ];

        return view('pages/layanan/' . $view, $data);
    }

    public function promo()
    {
        $filterPromo = [
            'start_date' => true
        ];

        $data = [
            'title' => 'Promo',
            'promotion_list' => $this->promotionModel->GetPromotion($filterPromo)
        ];

        return view('pages/promotion', $data);
    }

    public function price()
    {
        $data = [
            'title' => 'Daftar Harga',
            'stroller_list' => $this->itemModel->GetItem(['item_name_1' => 'STROLLER']),
            'shoes_list' => $this->itemModel->GetItem(['item_name_1' => 'SEPATU', 'item_name_2' => 'TAS']),
            'helm_list' => $this->itemModel->GetItem(['item_name_1' => 'HELM']),
            'clothes_list' => $this->itemModel->GetItem(['item_name_1' => 'BAJU']),
            'office_list' => $this->itemModel->GetItem(['item_name_1' => 'KANTOR']),
            'bedroom_list' => $this->itemModel->GetItem(['item_name_1' => 'BED COVER'])
        ];

        return view('pages/price', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Kontak'
        ];

        return view('pages/contact', $data);
    }

    public function terms_condition()
    {
        $data = [
            'title' => 'Syarat dan Ketentuan'
        ];

        return view('pages/terms-condition', $data);
    }
}
