<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model', 'um');
    }

    public function index()
    {
        $data['users'] = $this->um->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['hak_akses'] = $this->um->get_hak();
        $this->form_validation->set_rules('id_user', 'Id User', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('phone', 'Telepon', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('user/create', $data);
            $this->load->view('templates/footer');
        } else {
            $user = array(
                'id_user' => $this->input->post('id_user'),
                'id_hak' => $this->input->post('id_hak'),
                'nm_user' => $this->input->post('nama'),
                'pass_user' => md5($this->input->post('password')),
                'j_kel' => $this->input->post('jenis_kelamin'),
                'phone' => $this->input->post('phone')
            );

            $this->um->insert($user);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan!');
            redirect('user');
        }
    }

    public function edit($id)
    {
        $data['hak_akses'] = $this->um->get_hak();
        $data['user'] = $this->um->get_by_id($id);
        // $this->form_validation->set_rules('id_user', 'Id User', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('phone', 'Telepon', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $user = array(
                // 'id_user' => $this->input->post('id_user'),
                'id_hak' => $this->input->post('id_hak'),
                'nm_user' => $this->input->post('nama'),
                'pass_user' => md5($this->input->post('password')),
                'j_kel' => $this->input->post('jenis_kelamin'),
                'phone' => $this->input->post('phone')
            );

            $this->um->update($user, $id);
            $this->session->set_flashdata('message', 'Data berhasil diubah!');
            redirect('user');
        }
    }

    public function delete($id)
    {
        $this->um->delete($id);
        $this->session->set_flashdata('message', 'Data berhasil dihapus!');
        redirect('user');
    }
}
