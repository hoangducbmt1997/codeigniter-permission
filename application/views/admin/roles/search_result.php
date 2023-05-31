<h5 class="mt-5 text-bold mb-3">Search Result:</h5>
<div class="col-12">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title mt-2 text-bold">All Roles</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table class="table-user table table-bordered table-striped">
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
					<?php foreach ($search_result as $role): ?>
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
								<a class="btn btn-success" href="<?php echo base_url('roles/edit/' . $role->id) ?>">Edit</a>
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
