<section class="content">

	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title text-bold">All Permissions</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">

						<table cellspacing="5" cellpadding="5">
							<form method="POST" id="search-permission" class="d-flex mb-3">
								<tr>
									<label class="mr-2" for="">Start date</label>
									<input type="text" class="form-control col-2" id="start_time" name="start_time">
								</tr>
								<div class="error">
									<?php echo form_error('start_time') ?>
								</div>

								<tr>
									<label class="mr-2" for="">End date</label>
									<input type="text" class="form-control col-2" id="end_time" name="end_time">

								</tr>
								<div class="error">
									<?php echo form_error('end_time') ?>
								</div>

								<tr>
									<button class="btn btn-success mt-3">Search</button>
								</tr>
							</form>
						</table>
						<table id="table-user" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Action</th>
									<th>Created At</th>
									<th>Updated At</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($permissions as $permission): ?>
									<tr>
										<td>
											<?php echo $permission->id ?>
										</td>
										<td>
											<?php echo $permission->action ?>
										</td>
										<td>
											<?php echo (new DateTime($permission->created_at))->format('d M Y '); ?>
										</td>
										<td>
											<?php echo (new DateTime($permission->updated_at))->format('d M Y'); ?>
										</td>
										<td class="text-center">
											<a class="btn btn-success"
												href="<?php echo base_url('permissions/edit/' . $permission->id) ?>">Edit</a>
											<a class="btn btn-danger"
												href="<?php echo base_url('permissions/delete/' . $permission->id) ?>">Delete</a>
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
		<div class="row">
			<div class="col-4 mt-1">
				<a href="<?php echo base_url('permissions/create') ?>" class="btn btn-success col-4">Create action<i
						class="ml-1 fas fa-plus-square"></i></a>
			</div>
		</div>
	</div>

	<div id="searchResult" class="row">

	</div>
	</div>

	<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</section>
