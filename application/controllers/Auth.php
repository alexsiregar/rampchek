<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    if ($this->session->userdata('email')) {
      if (!$this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()) {
        redirect('auth/logout');
      }
    }

    $data['title'] = 'Beranda';
    if ($this->session->userdata('email')) {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }
    $this->load->view('index', $data);
  }

  public function regulasi()
  {
    if ($this->session->userdata('email')) {
      if (!$this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()) {
        redirect('auth/logout');
      }
    }

    $data['title'] = 'Regulasi';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('regulasi', $data);
  }

  public function login()
  {
    if ($this->session->userdata('email')) {
      redirect('home');
    }

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == false) {
      $this->load->view('auth/login');
    } else {
      $this->_login();
    }
  }


  private function _login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['username' => $username])->row_array();

    if ($user) {
      if (password_verify($password, $user['password'])) {
        $data = [
          'email' => $user['email']
        ];
        $this->session->set_userdata($data);
        redirect('home');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
        redirect('auth/login');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered!</div>');
      redirect('auth/login');
    }
  }


  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
    redirect('auth');
  }
}
