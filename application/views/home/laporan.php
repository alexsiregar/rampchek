                <!-- Begin Page Content -->
                <div class="container-fluid">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                  <?= $this->session->flashdata('message'); ?>


                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Penguji</th>
                        <th scope="col">Nama Pengemudi</th>
                        <th scope="col">No Kendaraan</th>
                        <th scope="col">Hasil</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Cetak</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      <?php foreach ($pengecekan as $p) : ?>
                        <tr>
                          <th scope="row"><?= $no++; ?></th>
                          <td><?= date('d-F-Y', strtotime($p['waktu_pemeriksaan'])); ?><br><?= date('H:i:s', strtotime($p['waktu_pemeriksaan'])); ?>
                          </td>
                          <td><?= $p['penguji']; ?></td>
                          <td><?= $p['pengemudi']; ?></td>
                          <td><?= $p['no_kendaraan']; ?></td>
                          <td><a href="<?= base_url('home/detail/') . $p['id_pengecekan']; ?>" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a></td>
                          <td>
                            <a href="<?= base_url('home/editlaporan/') . $p['id_pengecekan']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                            <a href="javascript:" class="btn btn-danger" data-toggle="modal" data-id="<?= $p['id_pengecekan']; ?>" data-target="#hapusModal"><i class="fas fa-trash-alt"></i> Hapus</a>
                          </td>
                          <td>
                            <a href="<?= base_url('home/print/') . $p['id_pengecekan']; ?>" target="_blank" class="btn btn-success"><i class="fas fa-print"></i> Cetak</a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->



                <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Apakah Anda yakin ingin menghapus data ini ?
                      </div>
                      <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-danger" id="hapus-true-data">Hapus</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                      </div>
                    </div>
                  </div>
                </div>