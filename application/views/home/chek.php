                <!-- Begin Page Content -->
                <div class="container-fluid">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                  <div class="row">
                    <div class="col-lg-10">
                      <?= $this->session->flashdata('message'); ?>

                      <form id="regForm" action="<?= base_url('home/prosespengecekan'); ?>" method="POST">

                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <label class="col-form-label">Penguji</label>
                              <input type="text" class="form-control" placeholder="Nama Penguji" autocomplete="off" name="penguji" oninput="this.classList.remove('invalid')">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <label class="col-form-label">Pengemudi</label>
                              <input type="text" class="form-control" placeholder="Nama Pengemudi" autocomplete="off" name="pengemudi" oninput="this.classList.remove('invalid')">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <label class="col-form-label">Nama PO</label>
                              <input type="text" class="form-control" placeholder="Nama PO" autocomplete="off" name="nama_po" oninput="this.classList.remove('invalid')">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <label class="col-form-label">Nomor Kendaraan</label>
                              <input type="text" class="form-control" placeholder="Nomor Kendaraan" autocomplete="off" name="no_kendaraan" oninput="this.classList.remove('invalid')">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <label class="col-form-label">Nomor Stuk</label>
                              <input type="text" class="form-control" value="<?= $kode; ?>" readonly name="no_stuk" oninput="this.classList.remove('invalid')">
                            </div>
                          </div>
                        </div>

                        <div class="tab">
                          <span class="btn btn-primary mb-2" aria-disabled="true"><i class="fas fa-file-alt"></i> Unsur Administrasi</span>
                          <table class="table table-bordered border-dark">
                            <thead>
                              <tr class="border-dark table-danger align-middle text-center">
                                <th scope="col" rowspan="2" class="align-middle text-center border-dark">No</th>
                                <th scope="col" rowspan="2" class="align-middle text-center border-dark">Daftar</th>
                                <th scope="col" colspan="2" class="align-middle text-center border-dark">Kelayakan</th>
                                <th scope="col" rowspan="2" class="align-middle text-center border-dark">Keterangan</th>
                              </tr>
                              <tr class="border-dark table-danger">
                                <th class="border-dark">Layak</th>
                                <th class="border-dark">Tidak layak</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; ?>
                              <?php foreach ($administrasi as $a) : ?>
                                <tr>
                                  <th scope="row"><?= $no++; ?></th>
                                  <td><?= $a['daftar']; ?></td>
                                  <td>
                                    <div class="radio text-center">
                                      <input type="hidden" name="id_unadmin[<?= $a['id_unadmin']; ?>]" value="<?= $a['id_unadmin']; ?>"><input type="radio" checked name="admin[<?= $a['id_unadmin']; ?>]" value="LAYAK">
                                    </div>
                                  </td>
                                  <td>
                                    <div class="radio text-center">
                                      <input type="hidden" name="id_unadmin[<?= $a['id_unadmin']; ?>]" value="<?= $a['id_unadmin']; ?>"><input type="radio" name="admin[<?= $a['id_unadmin']; ?>]" value="TIDAK LAYAK">
                                    </div>
                                  </td>
                                  <td>
                                    <input style="width: 100%;" type="text" autocomplete="off" name="keterangan_admin[]" id="keterangan_admin">
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>


                        <div class="tab">
                          <span class="btn btn-primary mb-2" aria-disabled="true"><i class="fas fa-file-alt"></i> Unsur Teknis</span>
                          <table class="table table-bordered border-dark">
                            <thead>
                              <tr class="border-dark table-danger align-middle text-center">
                                <th scope="col" rowspan="2" class="align-middle text-center border-dark">No</th>
                                <th scope="col" rowspan="2" class="align-middle text-center border-dark">Daftar</th>
                                <th scope="col" colspan="2" class="align-middle text-center border-dark">Kelayakan</th>
                                <th scope="col" rowspan="2" class="align-middle text-center border-dark">Keterangan</th>
                              </tr>
                              <tr class="border-dark table-danger">
                                <th class="border-dark">Layak</th>
                                <th class="border-dark">Tidak layak</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; ?>
                              <?php foreach ($teknis as $t) : ?>
                                <tr>
                                  <th scope="row"><?= $no++; ?></th>
                                  <td><?= $t['daftar']; ?></td>
                                  <td>
                                    <div class="radio text-center">
                                      <input type="hidden" name="id_unteknis[<?= $t['id_unteknis']; ?>]" value="<?= $t['id_unteknis']; ?>"><input type="radio" checked name="teknis[<?= $t['id_unteknis']; ?>]" value="LAYAK">
                                    </div>
                                  </td>
                                  <td>
                                    <div class="radio text-center">
                                      <input type="hidden" name="id_unteknis[<?= $t['id_unteknis']; ?>]" value="<?= $t['id_unteknis']; ?>"><input type="radio" name="teknis[<?= $t['id_unteknis']; ?>]" value="TIDAK LAYAK">
                                    </div>
                                  </td>
                                  <td><input style="width: 100%;" type="text" autocomplete="off" name="keterangan_teknis[]" id="keterangan_teknis"></td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>


                        <div style="overflow:auto;">
                          <div style="float:right;">
                            <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)"><i class="fas fa-arrow-right"></i> Next</button>
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