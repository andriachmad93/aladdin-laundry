<?php

namespace App\Controllers;

use Config\App;

class Wilayah extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $builder = $this->db->table('wilayah_provinsi')->orderBy('nama', 'asc');
        $query = $builder->get();
        $get_prov = $query->getResult();

        $data['provinsi'] = $get_prov;
        //$data['path'] = base_url('assets');

        return view('address/test', $data);
    }

    public function add_ajax_kab($id_prov)
    {
        $builder = $this->db->table('wilayah_kabupaten')->orderBy('nama', 'asc');
        $query = $builder->getWhere(['provinsi_id' => $id_prov]);

        $data = "<option value=''>- Pilih Kabupaten -</option>";
        foreach ($query->getResult() as $value) {
            $data .= "<option value='" . $value->id . "'>" . $value->nama . "</option>";
        }
        echo $data;
    }

    public function add_ajax_kec($id_kab)
    {
        $builder = $this->db->table('wilayah_kecamatan')->orderBy('nama', 'asc');
        $query = $builder->getWhere(['kabupaten_id' => $id_kab]);

        $data = "<option value=''> - Pilih Kecamatan - </option>";
        foreach ($query->getResult() as $value) {
            $data .= "<option value='" . $value->id . "'>" . $value->nama . "</option>";
        }
        echo $data;
    }

    public function add_ajax_des($id_kec)
    {
        $builder = $this->db->table('wilayah_desa')->orderBy('nama', 'asc');
        $query = $builder->getWhere(['kecamatan_id' => $id_kec]);

        $data = "<option value=''> - Pilih Desa - </option>";
        foreach ($query->getresult() as $value) {
            $data .= "<option value='" . $value->id . "'>" . $value->nama . "</option>";
        }
        echo $data;
    }
}
