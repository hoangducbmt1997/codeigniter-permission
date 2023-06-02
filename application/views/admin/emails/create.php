<section class="content ">
	<div class="container-fluid ">
		<div class="col-md-12">
			<div class="card card-primary card-outline">
				<form action="<?php echo base_url('email/send-email') ?>" method="POST">
					<div class="card-header">
						<h3 class="card-title mt-2">Compose New Message</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">

						<div class="form-group">
							<input name="recipient" type="email" class="form-control" placeholder="To:">
						</div>
						<div class="error">
							<?php echo form_error('recipient'); ?>
						</div>
						<div class="form-group">
							<input name="subject" class="form-control" placeholder="Subject:">
						</div>
						<div class="error">
							<?php echo form_error('subject'); ?>
						</div>
						<div class="form-group">
							<textarea name="message" class="form-control" style="height: 300px">
					</textarea>
							<div class="error">
								<?php echo form_error('message'); ?>
							</div>
						</div>

					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<div class="float-right">
							<button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
						</div>
					</div>
				</form>
				<!-- /.card-footer -->
			</div>
			<!-- /.card -->
		</div>
	</div>
	</div>
