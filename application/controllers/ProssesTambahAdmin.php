<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProssesTambahAdmin extends CI_Controller
{




    public function index()

    {
        $data['title'] = '(Web Admin)Fly In Cloude  - TambahPengguna';
        $data['admin'] = $this->db->get_where('admin', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->load->view('admin/prosses-tambah-admin', $data);
    }
}
