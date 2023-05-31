    <!-- Main content -->
    <section class="content ">
        <div class="container-fluid ">
            <div class="row">
                <!-- left column -->
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title mt-2">Edit Role</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url('roles/update/' . $role->id); ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Name:</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $role->name ?>"
                                        placeholder="Enter email">
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
