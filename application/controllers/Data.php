<?php

Class Data extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

    }

    public function barang() {
        // instance object
        $crud = new grocery_CRUD();
        // pilih tabel yang akan digunakan
        $crud->set_table('tbl_barangs');
        // simpan hasilnya kedalam variabel output
        $output = $crud->render();
        // tampilkan di view
        //$this->_example_output($output);
        $this->load->view('template.php', $output);
    }

}
