                <!-- Begin Page Content -->
                <div class="container-fluid">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                  <div class="row">
                    <div class="col-lg-8">
                      <?= $this->session->flashdata('message'); ?>

                      <?= form_open('home/edituser/' . $edit['id_user']); ?>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="email" name="email" value="<?= $edit['email']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="username" name="username" value="<?= $edit['username']; ?>">
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