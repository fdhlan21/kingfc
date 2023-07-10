<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataUbahAdmin extends CI_Controller
{

    public function index()

    {
        $data['title'] = '(Web Admin)Fly In Cloude  - Ubah Password';
        $data['admin'] = $this->db->get_where('admin', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->load->view('admin/data-ubah-admin', $data);
    }
}
