<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TambahStok extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
    }

    public function tambah()
    {

        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah_stok' => $this->input->post('jumlah_stok')
        );


        // Memanggil model untuk menyimpan data ke database
        $barang_id = $this->Barang_model-> tambahBarang($data);

        if ($barang_id) {
            // Jika data berhasil disimpan, lakukan sesuatu (misalnya, tampilkan pesan sukses)
            echo "Data barang berhasil ditambahkan dengan ID: " . $barang_id;
        } else {
            // Jika terjadi kesalahan, tampilkan pesan error
            echo "Terjadi kesalahan saat menambahkan data barang";
        }
    }

    public function index()

    {
        $data['title'] = '(Web Admin)Fly In Cloude  - Ubah Password';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambah-stok', $data);
        $this->load->view('templates/footer');
    }
}
