<h5 class="mt-5 text-bold mb-3">Search Result:</h5>
<div class="col-12">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title text-bold">All Users</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table class="display nowrap table-user" style="width:100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Email</th>
						<th>Image</th>
						<th>Created At</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($search_result as $user): ?>
						<tr>
							<td>
								<?php echo $user->id ?>
							</td>
							<td>
								<?php echo $user->username ?>
							</td>
							<td>
								<?php echo $user->email ?>
							</td>
							<td class="text-center d-flex justify-content-center">
								<?php if (!empty($user->image)): ?>
									<img width="50" src="<?php echo base_url('uploads/admin/users/' . $user->image); ?>" alt="">
								<?php else: ?>
									<p class="mt-3">No image</p>
								<?php endif; ?>
							</td>
							<td>
								<?php echo (new DateTime($user->created_at))->format('d M Y'); ?>
							</td>
							<td class="text-center">
								<a class="btn btn-warning" href="<?php echo base_url('user/role/' . $user->id) ?>">Role</a>
								<a class="btn btn-success" href="<?php echo base_url('users/edit/' . $user->id) ?>">Edit</a>
								<a class="btn btn-danger" href="<?php echo base_url('users/delete/' . $user->id) ?>">Delete</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Email</th>
						<th>Image</th>
						<th>Created At</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>

		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>
