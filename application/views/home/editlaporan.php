                <!-- Begin Page Content -->
                <div class="container-fluid">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                  <div class="row">
                    <div class="col-lg-8">
                      <?= $this->session->flashdata('message'); ?>

                      <form id="regForm" action="<?= base_url('home/prosesedit'); ?>" method="POST">
                        <input type="text" hidden value="<?= $detail['id_pengecekan']; ?>" name="id_pengecekan">
                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <label class="col-form-label">Penguji</label>
                              <input type="text" class="form-control" value="<?= $detail['penguji']; ?>" autocomplete="off" name="penguji">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <label class="col-form-label">Pengemudi</label>
                              <input type="text" class="form-control" value="<?= $detail['pengemudi']; ?>" autocomplete="off" name="pengemudi">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <label class="col-form-label">Nama PO</label>
                              <input type="text" class="form-control" value="<?= $detail['nama_po']; ?>" autocomplete="off" name="nama_po">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <label class="col-form-label">Nomor Kendaraan</label>
                              <input type="text" class="form-control" value="<?= $detail['no_kendaraan']; ?>" autocomplete="off" name="no_kendaraan">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <label class="col-form-label">Nomor Stuk</label>
                              <input type="text" class="form-control" value="<?= $detail['no_stuk']; ?>" readonly name="no_stuk">
                            </div>
                          </div>
                        </div>



                        <?php
                        $id_unadmin = json_decode($unsur['id_unadmin'], true);
                        ?>


                        <?php
                        foreach ($id_unadmin as $key) {
                          $admindetail = "SELECT * FROM `unsur_administrasi` WHERE `unsur_administrasi`.`id_unadmin` = $key";
                          $administrasi[] = $this->db->query($admindetail)->result_array();
                        }

                        // var_dump($administrasi);
                        ?>
                        <div class="tab">
                          <span class="btn btn-primary mb-2" aria-disabled="true">Unsur Administrasi</span>
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Daftar</th>
                                <th scope="col">Kelayakan</th>
                                <th scope="col">Keterangan</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; ?>
                              <?php foreach ($administrasi as $a) : ?>
                                <tr>
                                  <th scope="row"><?= $no++; ?></th>
                                  <td><?= $a[0]['daftar']; ?></td>
                                  <td>
                                    <div class="radio">
                                      <input type="hidden" name="id_unadmin[<?= $a[0]['id_unadmin'] ?>]" value="<?= $a[0]['id_unadmin'] ?>">
                                      <label><input type="radio" <?php if (json_decode($unsur['kondisi_admin'], true)[intval($a[0]['id_unadmin'])] == 'LAYAK') {
                                                                    echo 'checked';
                                                                  } ?> name="admin[<?= $a[0]['id_unadmin'] ?>]" value="LAYAK">Layak</label>
                                      <label><input type="radio" <?php if (json_decode($unsur['kondisi_admin'], true)[intval($a[0]['id_unadmin'])] != 'LAYAK') {
                                                                    echo 'checked';
                                                                  } ?> name="admin[<?= $a[0]['id_unadmin'] ?>]" value="TIDAK LAYAK">Tidak Layak</label>
                                    </div>
                                  </td>
                                  <td>
                                    <!-- <?php
                                          var_dump(json_decode($unsur['keterangan_admin'], true)[$no - 2]);
                                          ?> -->
                                    <input type="text" autocomplete="off" name="keterangan_admin[]" id="keterangan_admin" value="<?= json_decode($unsur['keterangan_admin'], true)[$no - 2]; ?>">
                                    <!-- <?= json_decode($unsur['keterangan_admin'], true)[intval($a[0])] ?> -->
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>


                        <?php
                        $id_unteknis = json_decode($unsur['id_unteknis'], true);
                        ?>


                        <?php
                        foreach ($id_unteknis as $key) {
                          $teknisdetail = "SELECT * FROM `unsur_teknis` WHERE `unsur_teknis`.`id_unteknis` = $key";
                          $teknis[] = $this->db->query($teknisdetail)->result_array();
                        }
                        ?>

                        <div class="tab">
                          <span class="btn btn-primary mb-2" aria-disabled="true">Unsur Teknis</span>
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Daftar</th>
                                <th scope="col">Kelayakan</th>
                                <th scope="col">Keterangan</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; ?>
                              <?php foreach ($teknis as $t) : ?>
                                <tr>
                                  <th scope="row"><?= $no++; ?></th>
                                  <td><?= $t[0]['daftar']; ?></td>
                                  <td>
                                    <div class="radio">
                                      <input type="hidden" name="id_unteknis[<?= $t[0]['id_unteknis'] ?>]" value="<?= $t[0]['id_unteknis'] ?>">
                                      <label><input type="radio" <?php if (json_decode($unsur['kondisi_teknis'], true)[intval($t[0]['id_unteknis'])] == 'LAYAK') {
                                                                    echo 'checked';
                                                                  } ?> name="teknis[<?= $t[0]['id_unteknis'] ?>]" value="LAYAK">Layak</label>
                                      <label><input type="radio" <?php if (json_decode($unsur['kondisi_teknis'], true)[intval($t[0]['id_unteknis'])] != 'LAYAK') {
                                                                    echo 'checked';
                                                                  } ?> name="teknis[<?= $t[0]['id_unteknis'] ?>]" value="TIDAK LAYAK">Tidak Layak</label>
                                    </div>
                                  </td>
                                  <td>
                                    <input type="text" autocomplete="off" name="keterangan_teknis[]" id="keterangan_teknis" value="<?= json_decode($unsur['keterangan_teknis'], true)[$no - 2]; ?>">
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>


                        <div style="overflow:auto;">
                          <div style="float:right;">
                            <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next</button>
                          </div>
                        </div>

                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <!-- <span class="step"></span> -->
                        </div>

                      </form>


                    </div>
                  </div>


                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->