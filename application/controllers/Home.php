<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->library('cetak_pdf');
    $this->load->library('datatables');
  }

  public function print($id)
  {
    $detail = $this->db->get_where('pengecekan', ['id_pengecekan' => $id])->row_array();

    $pdf = new FPDF('P', 'mm', 'Letter');

    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 7, 'LAPORAN DETAIL UJI KELAYAKAN', 0, 1, 'C');
    $pdf->SetLineWidth(1);
    $pdf->Line(15, 25, 200, 25);
    $pdf->SetLineWidth(0);
    $pdf->Cell(0, 7, '', 0, 1, 'C');
    $pdf->Cell(10, 7, '', 0, 1);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 6, "Nama Penguji : " . $detail['penguji'], 0, 1);
    $pdf->Cell(0, 6, "Nama Pengemudi : " . $detail['pengemudi'], 0, 1);
    $pdf->Cell(0, 6, "Nama PO : " . $detail['nama_po'], 0, 1);
    $pdf->Cell(0, 6, "Nomor Kendaraan : " . $detail['no_kendaraan'], 0, 1);
    $pdf->Cell(0, 6, "Nomor Stuk : " . $detail['no_stuk'], 0, 1);
    $pdf->Cell(0, 6, "Tanggal Pemeriksaan : " . date('d-F-Y', strtotime($detail['waktu_pemeriksaan'])), 0, 1);
    $pdf->Cell(0, 6, "Waktu Pemeriksaan : " . date('H:i:s', strtotime($detail['waktu_pemeriksaan'])), 0, 1);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Ln(5);
    $pdf->Cell(0, 7, 'Administrasi', 0, 1);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(75, 6, 'Daftar', 1, 0, 'C');
    $pdf->Cell(40, 6, 'Kondisi', 1, 0, 'C');
    $pdf->Cell(80, 6, 'Keterangan', 1, 1, 'C');
    $pdf->SetFont('Arial', '', 10);
    $data = $this->db->get_where('pengecekan_unsur', ['id_pengecekan' => $id])->result_array();
    $kondisi_admin = json_decode($data[0]['kondisi_admin'], true);
    $ket_admin = json_decode($data[0]['keterangan_admin'], true);
    $id_unadmin = json_decode($data[0]['id_unadmin'], true);
    // var_dump($id_unadmin);
    foreach ($id_unadmin as $key) {
      $admindetail = "SELECT * FROM `unsur_administrasi` WHERE `unsur_administrasi`.`id_unadmin` = $key";
      $administrasi[] = $this->db->query($admindetail)->result_array();
    }
    $no = 0;
    foreach ($administrasi as $a) {
      $pdf->Cell(75, 6, $a[0]['daftar'], 1, 0, 'C');
      $pdf->Cell(40, 6, $kondisi_admin[$a[0]['id_unadmin']], 1, 0, 'C');
      $pdf->Cell(80, 6, $ket_admin[$no++], 1, 1, 'C');
    }


    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Ln(5);
    $pdf->Cell(0, 7, 'Teknis', 0, 1);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(75, 6, 'Daftar', 1, 0, 'C');
    $pdf->Cell(40, 6, 'Kondisi', 1, 0, 'C');
    $pdf->Cell(80, 6, 'Keterangan', 1, 1, 'C');
    $pdf->SetFont('Arial', '', 10);
    $kondisi_teknis = json_decode($data[0]['kondisi_teknis'], true);
    $ket_teknis = json_decode($data[0]['keterangan_teknis'], true);
    $id_unteknis = json_decode($data[0]['id_unteknis'], true);
    // // var_dump($id_unadmin);
    foreach ($id_unteknis as $key) {
      $adminteknis = "SELECT * FROM `unsur_teknis` WHERE `unsur_teknis`.`id_unteknis` = $key";
      $teknis[] = $this->db->query($adminteknis)->result_array();
    }
    $no = 0;
    foreach ($teknis as $t) {
      $pdf->Cell(75, 6, $t[0]['daftar'], 1, 0, 'C');
      $pdf->Cell(40, 6, $kondisi_teknis[$t[0]['id_unteknis']], 1, 0, 'C');
      $pdf->Cell(80, 6, $ket_teknis[$no++], 1, 1, 'C');
    }

    $pdf->Output();
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jumlah'] = $this->db->get('pengecekan')->num_rows();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('home/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambahuser()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'This email has already registered!'
    ]);
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]', [
      'matches' => 'Password dont match!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Tambah User';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['tambah'] = $this->db->get_where('user', ['role' => 2])->result_array();
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('home/lihatuser', $data);
      $this->load->view('templates/footer');
    } else {
      $user = [
        'email' => $this->input->post('email'),
        'username' => $this->input->post('username'),
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role' => 2
      ];

      $this->db->insert('user', $user);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil ditambahkan!</div>');
      redirect('home/tambahuser');
    }
  }

  public function edituser($id)
  {
    $this->form_validation->set_rules('username', 'Username', 'required');
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Edit User';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['edit'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('home/edituser', $data);
      $this->load->view('templates/footer');
    } else {
      $user = [
        'username' => $this->input->post('username')
      ];

      $this->db->set($user);
      $this->db->where('id_user', $id);
      $this->db->update('user');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil diedit!</div>');
      redirect('home/tambahuser');
    }
  }

  public function coba()
  {
    date_default_timezone_set('Asia/Jakarta');
    $date = '20210301 143404';
    // echo date('d-m-Y H:i:s');
    echo date("Ymd His");
  }


  public function pengecekan()
  {
    $data['title'] = 'Pengecekan';
    if ($this->db->get('pengecekan')->num_rows() > 0) {
      $a = $this->db->get('pengecekan')->last_row();
      $urutan = (int) substr($a->no_stuk, 3, 3);
    } else {
      $a = 0;
      $urutan = 0;
    }
    $urutan++;
    $hrf = "RMC";
    $data['kode'] = $hrf . sprintf("%03s", $urutan);
    $data['administrasi'] = $this->db->get('unsur_administrasi')->result_array();
    $data['teknis'] = $this->db->get('unsur_teknis')->result_array();
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('home/chek', $data);
    $this->load->view('templates/footer');
  }

  public function input()
  {
    $admin = [
      'Kartu Uji/STUK', 'Kp. Reguler', 'Kp. Cadangan(untuk kendaraan cadangan)', 'SIM Pengemudi'
    ];
    $teknisutama = [
      'Lampu Utama Kendaraan Dekat', 'Lampu Utama Kendaraan Jauh', 'Lampu Penunjuk Arah(Sein) Depan', 'Lampu Penunjuk Arah(Sein) Belakang', 'Lampu Mundur', 'Lampu Rem', 'Kondisi Rem Utama', 'Kondisi Rem Parkir', 'Kondisi Kaca Depan', 'Pintu Utama', 'Kondisi Ban Depan', 'Kondisi Ban Belakang', 'Sabuk Keselamatan Pengemudi', 'Pengukur Kecepatan', 'Penghapus Kaca(Wiper)', 'Pintu Darurat', 'Jendela Darurat', 'Alat Pemukul Kaca'
    ];
    $teknispenunjang = [
      'Lampu Posisi Depan', 'Lampu Posisi Belakang', 'Kaca Spion', 'Klakson', 'Lantai dan Tangga', 'Tempat Duduk Penumpang', 'Ban Cadangan', 'Segitiga Pengaman', 'Dongkrak', 'Pembuka Roda', 'Lampu Senter'
    ];
  }

  public function prosespengecekan()
  {
    date_default_timezone_set('Asia/Jakarta');
    $data = array(
      'penguji' => $this->input->post('penguji'),
      'pengemudi' => $this->input->post('pengemudi'),
      'nama_po' => $this->input->post('nama_po'),
      'no_kendaraan' => $this->input->post('no_kendaraan'),
      'no_stuk' => $this->input->post('no_stuk'),
      'waktu_pemeriksaan' => date("Ymd His")
    );
    $this->db->insert('pengecekan', $data);
    $id_pengecekan = $this->db->insert_id();

    $pengecekan_unsur = array(
      'id_pengecekan' => $id_pengecekan,
      'id_unadmin' => json_encode($this->input->post('id_unadmin')),
      'kondisi_admin' => json_encode($this->input->post('admin'), true),
      'keterangan_admin' => json_encode($this->input->post('keterangan_admin')),
      'id_unteknis' => json_encode($this->input->post('id_unteknis')),
      'kondisi_teknis' => json_encode($this->input->post('teknis'), true),
      'keterangan_teknis' => json_encode($this->input->post('keterangan_teknis'))
    );
    $this->db->insert('pengecekan_unsur', $pengecekan_unsur);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil terinput!</div>');
    redirect('home/pengecekan');
  }


  public function prosesedit()
  {

    $id_pengecekan = $this->input->post('id_pengecekan');
    $data = array(
      'penguji' => $this->input->post('penguji'),
      'pengemudi' => $this->input->post('pengemudi'),
      'nama_po' => $this->input->post('nama_po'),
      'no_kendaraan' => $this->input->post('no_kendaraan'),
      'no_stuk' => $this->input->post('no_stuk')
    );
    $this->db->set($data);
    $this->db->where('id_pengecekan', $id_pengecekan);
    $this->db->update('pengecekan');

    $pengecekan_unsur = array(
      'id_pengecekan' => $id_pengecekan,
      'id_unadmin' => json_encode($this->input->post('id_unadmin')),
      'kondisi_admin' => json_encode($this->input->post('admin'), true),
      'keterangan_admin' => json_encode($this->input->post('keterangan_admin')),
      'id_unteknis' => json_encode($this->input->post('id_unteknis')),
      'kondisi_teknis' => json_encode($this->input->post('teknis'), true),
      'keterangan_teknis' => json_encode($this->input->post('keterangan_teknis'))
    );

    $this->db->set($pengecekan_unsur);
    $this->db->where('id_pengecekan', $id_pengecekan);
    $this->db->update('pengecekan_unsur');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
    redirect('home/laporan');
  }


  public function laporan()
  {
    $data['title'] = 'Laporan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['pengecekan'] = $this->db->get('pengecekan')->result_array();
    $data['pengecekan_unsur'] = $this->db->get('pengecekan_unsur')->result_array();
    $data['unsur_administrasi'] = $this->db->get('unsur_administrasi')->result_array();
    $data['unsur_teknis'] = $this->db->get('unsur_teknis')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('home/laporan', $data);
    $this->load->view('templates/footer');
  }

  public function detail($id)
  {
    $data['title'] = 'Detail';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['pengecekan'] = $this->db->get_where('pengecekan', ['id_pengecekan' => $id])->row_array();
    $data['detail'] = $this->db->get_where('pengecekan_unsur', ['id_pengecekan' => $id])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('home/detail', $data);
    $this->load->view('templates/footer');
  }


  public function hapus($id)
  {
    $this->db->where('id_pengecekan', $id);
    $this->db->delete('pengecekan');
    $this->db->where('id_pengecekan', $id);
    $this->db->delete('pengecekan_unsur');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
    redirect('home/laporan');
  }

  public function hapususer($id)
  {
    $this->db->where('id_user', $id);
    $this->db->delete('user');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
    redirect('home/tambahuser');
  }

  public function editlaporan($id)
  {
    $data['title'] = 'Edit';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['detail'] = $this->db->get_where('pengecekan', ['id_pengecekan' => $id])->row_array();
    $data['unsur'] = $this->db->get_where('pengecekan_unsur', ['id_pengecekan' => $id])->row_array();
    // var_dump(json_decode($data['unsur']['keterangan_admin'], true));
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('home/editlaporan', $data);
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

  public function editpassword()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $current_password = $this->input->post('current_password');
    $new_password = $this->input->post('new_password1');
    if (!password_verify($current_password, $data['user']['password'])) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
      redirect('home/edit');
    } else {
      if ($current_password == $new_password) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
        redirect('home/edit');
      } else {
        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
        $this->db->set('password', $password_hash);
        $this->db->where('email', $this->session->userdata('email'));
        $this->db->update('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
        redirect('home/edit');
      }
    }
  }
}
