<h5 class="mt-5 text-bold mb-3">Search Result:</h5>
<div class="col-12">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title mt-2 text-bold">All Permission</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table class="table table-user table-bordered table-striped">
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
					<?php foreach ($search_result as $permission): ?>
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
