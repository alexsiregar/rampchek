                <!-- Begin Page Content -->
                <div class="container-fluid">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                  <div class="row">
                    <div class="col-lg-8">
                      <?= $this->session->flashdata('message'); ?>

                      <?= form_open('home/edit'); ?>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">email</label>
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
                          <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>

                  <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="<?= base_url('admin/role'); ?>" method="POST">
                          <div class="modal-body">
                            <div class="form-group">
                              <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->