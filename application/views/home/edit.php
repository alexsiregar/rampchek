                <!-- Begin Page Content -->
                <div class="container-fluid">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                  <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal"><i class="fas fa-key"></i> Ubah Password</a>

                  <div class="row">
                    <div class="col-lg-8">
                      <?= $this->session->flashdata('message'); ?>

                      <?= form_open('home/edit'); ?>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>">
                          <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                        </div>
                      </div>
                      <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
                        </div>
                      </div>
                      </form>
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
                        <h5 class="modal-title" id="newRoleModalLabel">Ubah Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="<?= base_url('home/editpassword'); ?>" method="post">
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                            <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                          </div>
                          <div class="form-group">
                            <label for="new_password1">New Password</label>
                            <input type="password" class="form-control" id="new_password1" name="new_password1" required>
                            <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                          </div>
                          <div class="form-group">
                            <label for="new_password2">Repeat Password</label>
                            <input type="password" class="form-control" id="new_password2" name="new_password2" required>
                            <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>