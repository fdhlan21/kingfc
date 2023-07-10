<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('gambar_model');
    }
 public function tambah() {

    if($_POST) {
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah_stok' => $this->input->post('jumlah_stok')
        );
        if ($this->Barang_model->tambahStok($data)) {
            redirect('stokbarang');
        } else {
                echo 'Gagal menambahkan barang.';
        }
    }

 }
    public function index()

    {
        $data['title'] = 'Welcome Zavastok';
        $data['stokbarang'] = $this->gambar_model->get_gambar();
        $data['admin'] = $this->db->get_where('admin', ['username' =>
        $this->session->userdata('username')])->row_array();
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/stok', $data);
        $this->load->view('templates/footer');
    
        
    } 
}
