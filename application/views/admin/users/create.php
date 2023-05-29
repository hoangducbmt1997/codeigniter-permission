    <!-- Main content -->
    <section class="content ">
      <div class="container-fluid ">
        <div class="row">
          <!-- left column -->
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Users</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url('users/store'); ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address:</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>

									<div class="error">
										<?php echo form_error('email'); ?>
									</div>

									<div class="form-group">
                    <label for="exampleInputFile">Image User</label>
                    <div class="input-group">
                      <div class="custom-file">
  											<input class="form-control" name="image" type="file" id="formFile">
                      </div>
                    </div>
                  </div>

										<div class="error">
												<?php echo form_error('image'); ?>
										</div>


									<div class="form-group">
                    <label for="exampleInputEmail1">Username:</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter Username">
                  </div>

									<div class="error">
										<?php echo form_error('username'); ?>
									</div>

									<div class="form-group">
                    <label for="exampleInputPassword1">Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>

									<div class="error">
										<?php echo form_error('password'); ?>
									</div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Re-Password:</label>
                    <input type="password" name="re_password" class="form-control"  placeholder="Password">
                  </div>

									<div class="error">
										<?php echo form_error('re_password'); ?>
									</div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->



          </div>

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
