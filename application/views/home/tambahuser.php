                <!-- Begin Page Content -->
                <div class="container-fluid">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                  <div class="row">
                    <div class="col-lg-8">
                      <?= $this->session->flashdata('message'); ?>

                      <?= form_open('home/tambahuser'); ?>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
                          <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>">
                          <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Passowrd</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password" name="password1">
                          <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password2" class="col-sm-2 col-form-label">Confirm Passowrd</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password2" name="password2">
                          <?= form_error('password2', '<small class="text-danger">', '</small>') ?>
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



                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->