<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembukaan extends CI_Controller
{

	function __construct(){

		parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'SPP - Pembukaan Besar';
        $data['admin'] = $this->db->get_where('admin', ['username' =>
        $this->session->userdata('username')])->row_array();

        // Cek role_id pengguna
        if ($data['admin']['role_id'] == 1) {
            // Jika role_id adalah 1 (admin), tampilkan view admin
            $this->load->view('templates/header', $data);
            $this->load->view('topbar', $data);
            $this->load->view('page/pembukaan/pembukaan', $data);
            $this->load->view('templates/footer');
        } elseif ($data['admin']['role_id'] == 2) {
            // Jika role_id adalah 2 (user), tampilkan view user
            $this->load->view('templates/header', $data);
            $this->load->view('topbar', $data);
            $this->load->view('page/slider/slider', $data);
            $this->load->view('templates/footer');
        } else {
            // Jika role_id tidak valid, tampilkan pesan error
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/error', $data);
            $this->load->view('templates/footer');
        }
    }



    public function add()
    {
        $data['title'] = 'SPP - Tambah Pembukaan Besar';
        $data['admin'] = $this->db->get_where('admin', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['options'] = $this->db->get('siswa')->result_array();
        $data['options'] = $this->db->get('siswa')->result_array();



        $this->load->view('templates/header', $data);
        // $this->load->view('topbar', $data);
        $this->load->view('page/pembukaan/add', $data);
        $this->load->view('templates/footer');
    }

    public function edit()

    {
        $data['title'] = 'SPP - Edit Pembukaan';
        $data['admin'] = $this->db->get_where('admin', ['username' =>
        $this->session->userdata('username')])->row_array();


        $this->load->view('templates/header', $data);
        // $this->load->view('topbar', $data);
        $this->load->view('page/pembukaan/edit', $data);
        $this->load->view('templates/footer');
    }
}
