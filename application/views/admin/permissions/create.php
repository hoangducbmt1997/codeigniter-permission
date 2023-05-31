    <!-- Main content -->
    <section class="content ">
      <div class="container-fluid ">
        <div class="row">
          <!-- left column -->
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title mt-2">Create Action Permission:</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url('permissions/store'); ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
									<p class="fst-italic">Note: Permission names will begin with a noun and a _ and end with an action. For example: user_add, product_delete,...</p>
                  <div class="form-group">
                    <label for="action">Action:</label>
                    <input type="text" name="action" class="form-control slug" id="action" placeholder="Enter action">
                  </div>
									<div class="error">
										<?php echo form_error('action'); ?>
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
