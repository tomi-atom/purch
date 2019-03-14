<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("data_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["data"] = $this->data_model->getAll();
        $this->load->view("admin/data/list", $data);
    }

    public function add()
    {
        $data = $this->data_model;
        $validation = $this->form_validation;
        $validation->set_rules($data->rules());

        if ($validation->run()) {
            $data->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/data/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/data');

        $datas = $this->data_model;
        $validation = $this->form_validation;
        $validation->set_rules($datas->rules());

        if ($validation->run()) {
            $datas->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["data"] = $datas->getById($id);
        if (!$data["data"]) show_404();

        $this->load->view("admin/data/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if ($this->data_model->delete($id)) {
            redirect(site_url('admin/data'));
        }
    }
}