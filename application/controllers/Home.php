<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('home/index', $data);
    $this->load->view('templates/footer');
  }

  public function edit()
  {
    $this->form_validation->set_rules('username', 'Username', 'required');
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Edit Profil';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('home/edit', $data);
      $this->load->view('templates/footer');
    } else {
      $username = $this->input->post('username');
      $this->db->set('username', $username);
      $this->db->where('email', $this->session->userdata('email'));
      $this->db->update('user');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Username changed!</div>');
      redirect('home/edit');
    }
  }

  public function __destruct()
  {
    $this->session->unmark_flash('message');
  }
}
