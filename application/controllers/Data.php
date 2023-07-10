<?php

class Data extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this->load->model('data_model');
}

public function index() {

 $data['result'] = $this->data_model->get_data();
 $this->load->view('index', $data);
    
}

}

?>