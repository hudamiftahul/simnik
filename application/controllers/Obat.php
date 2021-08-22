<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Obat_Model', 'pm');
    }

    public function index()
    {
        $data['obat'] = $this->pm->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('obat/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('obat/create');
            $this->load->view('templates/footer');
        } else {
            $obat = array(
                'id_obt' => $this->input->post('id_obt'),
                'nm_obt' => $this->input->post('nm_obt'),
                'hrg_obt' => $this->input->post('hrg_obt'),
                'stok_obt' => $this->input->post('stok_obt'),
            );

            $this->pm->insert($obat);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan!');
            redirect('obat');
        }
    }

    public function edit($id)
    {
        $data['obat'] = $this->pm->get_by_id($id);
        $this->form_validation->set_rules('nm_obt', 'Nama Obat', 'required');
        $this->form_validation->set_rules('hrg_obt', 'Harga Obat', 'required');
        $this->form_validation->set_rules('stok_obt', 'Stok Obat', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('obat/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $obat = array(
                'nm_obt' => $this->input->post('nm_obt'),
                'hrg_obt' => $this->input->post('hrg_obt'),
                'stok_obt' => $this->input->post('stok_obt'),
            );

            $this->pm->update($obat, $id);
            $this->session->set_flashdata('message', 'Data berhasil diubah!');
            redirect('obat');
        }
    }

    public function delete($id)
    {
        $this->pm->delete($id);
        $this->session->set_flashdata('message', 'Data berhasil dihapus!');
        redirect('obat');
    }

    private function _rules()
    {
        $this->form_validation->set_rules('id_obt', 'Id Obat', 'required');
        $this->form_validation->set_rules('nm_obt', 'Nama Obat', 'required');
        $this->form_validation->set_rules('hrg_obt', 'Harga Obat', 'required');
        $this->form_validation->set_rules('stok_obt', 'Stok Obat', 'required');
    }
}
