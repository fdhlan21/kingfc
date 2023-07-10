<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SimpanBarang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function upload_gambar()
    {
        // Ambil data gambar dari form
        $image = $_FILES['image'];

        // Konfigurasi upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048; // maksimal ukuran file (dalam kilobyte)
        $config['file_name'] = $image; // menggunakan nama asli file

        // Lakukan proses upload
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
            // Jika upload berhasil, dapatkan data file
            $data = $this->upload->data();
            $nama_gambar = $data['file_name'];
            $path_gambar = $data['full_path'];

            // Simpan data gambar ke database
            $this->db->insert('tabel_gambar', array(
                'nama_gambar' => $nama_gambar,
                'path_gambar' => $path_gambar
            ));

            // Tampilkan pesan sukses atau redirect ke halaman lain
            echo 'Upload gambar berhasil';
        } else {
            // Jika upload gagal, tampilkan pesan error
            echo 'Upload gambar gagal: ' . $this->upload->display_errors();
        }
    }


    public function index()

    {
        $data['title'] = '(Web Admin)Fly In Cloude  - Ubah Password';
        $data['admin'] = $this->db->get_where('admin', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->load->view('admin/simpang-barang', $data);
    }
}
