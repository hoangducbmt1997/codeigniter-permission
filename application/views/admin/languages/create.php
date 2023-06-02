<!-- Main content -->
<section class="content ">
	<div class="container-fluid ">
		<div class="row">
			<!-- left column -->
			<div class="col-12">
				<!-- general form elements -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title mt-2">Create Config Language:</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form action="<?php echo base_url('language/store'); ?>" method="POST"
						enctype="multipart/form-data">
						<div class="card-body">
							<div class="form-group">
								<label for="action">Key:</label>
								<input type="text" name="key" class="form-control slug" id="action"
									placeholder="Enter key">
							</div>
							<div class="error">
								<?php echo form_error('key'); ?>
							</div>
							<div class="form-group">
								<label for="action">Value:</label>
								<input type="text" name="value" class="form-control slug" id="action"
									placeholder="Enter value">
							</div>
							<div class="error">
								<?php echo form_error('value'); ?>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Language code:</label>
								<select class="form-select " name="selected_code">
									<li>
										<option value='0'>Please select one</option>
									</li>
									<li>
										<option value="eng">
											English
									</li>
									<li>
										<option value="vi">
											VietNam
									</li>
								</select>
								<div class="error mt-2">
									<?php echo form_error('selected_code'); ?>
								</div>
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
