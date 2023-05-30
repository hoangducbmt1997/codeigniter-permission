<section class="content">

	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title text-bold">All Roles</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table cellspacing="5" cellpadding="5">
							<tbody class="d-flex mb-3">
								<tr>
									<label class="mr-2" for="">Star date:</label>
									<input type="text" id="min" name="min">
								</tr>
								<tr>
									<label class="mr-2 ml-2" for="">End date:</label>
									<input type="text" id="max" name="max">
								</tr>
							</tbody>
						</table>
						<table id="table-role" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Role Name</th>

									<th>Created At</th>
									<th>Updated At</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($roles as $role): ?>
									<tr>
										<td>
											<?php echo $role->id ?>
										</td>
										<td>
											<?php echo $role->name ?>
										</td>

										<td>
											<?php echo (new DateTime($role->created_at))->format('Y-m-d'); ?>
										</td>
										<td>
											<?php echo (new DateTime($role->updated_at))->format('d M Y'); ?>
										</td>
										<td class="text-center">
											<a class="btn btn-warning"
												href="<?php echo base_url('role/permissions/' . $role->id) ?>">Permissions</a>
											<a class="btn btn-success"
												href="<?php echo base_url('roles/edit/' . $role->id) ?>">Edit</a>
											<a class="btn btn-danger"
												href="<?php echo base_url('roles/delete/' . $role->id) ?>">Delete</a>
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
				<a href="<?php echo base_url('roles/create') ?>" class="btn btn-success col-4">Create role<i
						class="ml-1 fas fa-plus-square"></i></a>
			</div>
		</div>
	</div>
	<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</section>
