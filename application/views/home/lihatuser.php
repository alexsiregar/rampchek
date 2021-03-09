                <!-- Begin Page Content -->
                <div class="container-fluid">

                  <div class="row">
                    <div class="col-lg-6">
                      <?= $this->session->flashdata('message'); ?>


                      <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal"><i class="fas fa-user-plus"></i> Tambah User Baru</a>
                      <div class="">
                        <?= form_error('email', '<p class="text-danger">', '</p>'); ?>
                        <?= form_error('username', '<p class="text-danger">', '</p>'); ?>
                        <?= form_error('password1', '<p class="text-danger">', '</p>'); ?>
                        <?= form_error('password2', '<p class="text-danger">', '</p>'); ?>
                      </div>

                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach ($tambah as $t) : ?>
                            <tr>
                              <th scope="row"><?= $i; ?></th>
                              <td><?= $t['email']; ?></td>
                              <td><?= $t['username']; ?></td>
                              <td>
                                <a href="<?= base_url('home/edituser/') . $t['id_user']; ?>" class="badge badge-success"><i class="fas fa-edit"></i> edit</a>
                                <a href="javascript:" class="badge badge-danger" data-toggle="modal" data-id="<?= $t['id_user']; ?>" data-target="#hapusUser"><i class="fas fa-trash-alt"></i> Hapus</a>
                              </td>
                            </tr>
                            <?php $i++; ?>
                          <?php endforeach; ?>
                        </tbody>
                      </table>


                    </div>
                  </div>



                  <div class="modal fade" id="hapusUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <a href="javascript:;" class="btn btn-danger" id="hapus-user-data">Hapus</a>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        </div>
                      </div>
                    </div>
                  </div>





                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->




                <!-- Modal -->
                <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="newRoleModalLabel">Tambah User Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="<?= base_url('home/tambahuser'); ?>" method="post">
                        <div class="modal-body">
                          <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password1" placeholder="Password">
                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password2" placeholder="Ulangi Password" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Add</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>