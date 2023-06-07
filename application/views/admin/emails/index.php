<section class="content">

	<div class="container-fluid">
		<div class="row mt-3 d-flex justify-content-end mb-3">
			<div class="col-4 d-flex justify-content-end">
				<a href="<?php echo base_url('email/create') ?>" class="btn btn-success col-4">Create Email<i class="ml-1 fas fa-plus-square"></i></a>
			</div>
		</div>
		<div class="row" id="searchResult">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title text-bold mt-2">Inbox</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="table-user" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Send to</th>
									<th>Subject</th>
									<th>Content</th>
									<th>Created At</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($emails as $email): ?>
									<tr>
										<td>
											<?php echo $email->id ?>
										</td>
										<td>
											<?php echo $email->send_to ?>
										</td>
										<td>
										<?php echo $email->subject ?>
										</td>
										<td>
										<?php echo $email->content ?>
										</td>
										<td>
											<?php echo (new DateTime($email->created_at))->format('d M Y '); ?>
										</td>
										<td class="text-center">
											<a class="btn btn-info"
												href="<?php echo base_url('email/resend-email/' . $email->id) ?>">Re-send</a>
											<a class="btn btn-danger"
												href="<?php echo base_url('emails/delete/' . $email->id) ?>"><?php echo $this->lang->line('btn_delete') ?></a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>

						</table>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>

	</div>

	</div>

	<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</section>
