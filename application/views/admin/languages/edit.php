<!-- Main content -->
<section class="content ">
	<div class="container-fluid ">
		<div class="row">
			<!-- left column -->
			<div class="col-12">
				<!-- general form elements -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title mt-2">Edit Config Language:</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form action="<?php echo base_url('language/update/' . $language->id); ?>" method="POST"
						enctype="multipart/form-data">
						<div class="card-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Key:</label>
								<input type="text" name="key" class="form-control"
									value="<?php echo $language->key_name ?>" placeholder="Enter email">
							</div>
							<div class="error">
								<?php echo form_error('key'); ?>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Value:</label>
								<input type="text" name="value" class="form-control"
									value="<?php echo $language->value ?>" placeholder="Enter email">
							</div>
							<div class="error">
								<?php echo form_error('value'); ?>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Language code:</label>
								<select class="form-select " name="selected_code">
									<li>
										<option value="0">Please select one</option>
									</li>
									<li>
										<option value="eng" <?php

										if ($language->lang_code == 'eng') {
											echo 'selected';
										}
										?>>
											English
									</li>
									<li>
										<option value="vi" <?php

										if ($language->lang_code == 'vi') {
											echo 'selected';
										}
										?>>
											VietNam
									</li>
								</select>
							</div>
							<div class="error">
								<?php echo form_error('selected_code'); ?>
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
