<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lab extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lab_Model', 'pm');
    }

    public function index()
    {
        $data['lab'] = $this->pm->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('lab/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('lab/create');
            $this->load->view('templates/footer');
        } else {
            $lab = array(
                'id_lab' => $this->input->post('id_lab'),
                'nm_lab' => $this->input->post('nm_lab'),
                'trf_lab' => $this->input->post('trf_lab'),
            );

            $this->pm->insert($lab);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan!');
            redirect('lab');
        }
    }

    public function edit($id)
    {
        $data['lab'] = $this->pm->get_by_id($id);
        $this->form_validation->set_rules('nm_lab', 'Nama Lab', 'required');
        $this->form_validation->set_rules('trf_lab', 'Harga Lab', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('lab/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $lab = array(
                'nm_lab' => $this->input->post('nm_lab'),
                'trf_lab' => $this->input->post('trf_lab'),
            );

            $this->pm->update($lab, $id);
            $this->session->set_flashdata('message', 'Data berhasil diubah!');
            redirect('lab');
        }
    }

    public function delete($id)
    {
        $this->pm->delete($id);
        $this->session->set_flashdata('message', 'Data berhasil dihapus!');
        redirect('lab');
    }

    private function _rules()
    {
        $this->form_validation->set_rules('id_lab', 'Id Lab', 'required');
        $this->form_validation->set_rules('nm_lab', 'Nama Lab', 'required');
        $this->form_validation->set_rules('trf_lab', 'Harga Lab', 'required');
    }
}
