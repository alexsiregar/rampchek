                <!-- Begin Page Content -->
                <div class="container-fluid">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-4 text-gray-800">
                    <span class="badge bg-primary text-white p-2"><i class="fas fa-info-circle"></i> <?= $title; ?> <?= $pengecekan['no_kendaraan']; ?></span>
                  </h1>
                  <div class="mb-3">
                    <span class="badge bg-warning text-white p-1">Penguji : <?= $pengecekan['penguji']; ?></span><br>
                    <span class="badge bg-warning text-white p-1">Pengemudi : <?= $pengecekan['pengemudi']; ?></span>
                    <span class="badge bg-warning text-white p-1">Nama PO : <?= $pengecekan['nama_po']; ?></span><br>
                    <span class="badge bg-warning text-white p-1">No Stuk : <?= $pengecekan['no_stuk']; ?></span>
                    <span class="badge bg-warning text-white p-1">Tanggal : <?= date('d-F-Y', strtotime($pengecekan['waktu_pemeriksaan'])); ?></span>
                    <span class="badge bg-warning text-white p-1">Pukul : <?= date('H:i:s', strtotime($pengecekan['waktu_pemeriksaan'])); ?></span>
                  </div>


                  <?php
                  $id_unadmin = json_decode($detail['id_unadmin'], true);
                  ?>


                  <?php
                  foreach ($id_unadmin as $key) {
                    $admindetail = "SELECT * FROM `unsur_administrasi` WHERE `unsur_administrasi`.`id_unadmin` = $key";
                    $administrasi[] = $this->db->query($admindetail)->result_array();
                  }
                  ?>


                  <?php
                  $id_unteknis = json_decode($detail['id_unteknis'], true);
                  // var_dump($id_unteknis);
                  // die;
                  ?>


                  <?php
                  foreach ($id_unteknis as $key) {
                    $teknisdetail = "SELECT * FROM `unsur_teknis` WHERE `unsur_teknis`.`id_unteknis` = $key";
                    $teknis[] = $this->db->query($teknisdetail)->result_array();
                  }
                  ?>

                  <table class="table table-bordered text-center">
                    <thead>
                      <tr class="table-info">
                        <th style="width: 30%" scope="col"><span class="text-dark">Administrasi</span></th>
                        <th style="width: 15%" scope="col"><span class="text-dark">Kondisi</span></th>
                        <th style="width: 35%" scope="col"><span class="text-dark">Keterangan</span></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $kondisi_admin = json_decode($detail['kondisi_admin'], true); ?>
                      <?php $keterangan_admin = json_decode($detail['keterangan_admin'], true);
                      // var_dump($keterangan_admin);
                      $no = 0;
                      ?>

                      <?php foreach ($administrasi as $a) : ?>
                        <tr>
                          <th class="d-flex text-start"><?= $a[0]['daftar']; ?></th>
                          <td><span <?php if ($kondisi_admin[$a[0]['id_unadmin']] == 'LAYAK') {
                                      echo 'class="text-white badge bg-success"';
                                    } else {
                                      echo 'class="text-white badge bg-danger"';
                                    } ?>><?= $kondisi_admin[$a[0]['id_unadmin']]; ?></span></td>
                          <td><?= $keterangan_admin[$no++]; ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>


                  <table class="table table-bordered text-center">
                    <thead>
                      <tr class="table-info">
                        <th style="width: 30%" scope="col"><span class="text-dark">Teknis</span></th>
                        <th style="width: 15%" scope="col"><span class="text-dark">Kondisi</span></th>
                        <th style="width: 35%" scope="col"><span class="text-dark">Keterangan</span></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $kondisi_teknis = json_decode($detail['kondisi_teknis'], true); ?>
                      <?php $keterangan_teknis = json_decode($detail['keterangan_teknis'], true);
                      $no = 0;
                      ?>
                      <?php foreach ($teknis as $t) : ?>
                        <tr>
                          <th scope="row" class="d-flex text-start"><?= $t[0]['daftar']; ?></th>
                          <td><span <?php if ($kondisi_teknis[$t[0]['id_unteknis']] == 'LAYAK') {
                                      echo 'class="text-white badge bg-success"';
                                    } else {
                                      echo 'class="text-white badge bg-danger"';
                                    } ?>><?= $kondisi_teknis[$t[0]['id_unteknis']]; ?></span></td>
                          <td><?= $keterangan_teknis[$no++]; ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>







                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->