<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UbahStok extends CI_Controller
{
    public function index()

    {
        $data['title'] = 'FlyInCloud(Ubah Stok)';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/stok-ubah', $data);
        $this->load->view('templates/footer');
    }
}
