<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataUbahStokBarang extends CI_Controller
{

    public function index()

    {
        $data['title'] = '(Web Admin)Fly In Cloude  - Ubah Stok Barang';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('admin/ubah-stok-barang', $data);
    }
}
