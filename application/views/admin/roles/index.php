<section class="content">
	<div class="container-fluid">
		<form method="POST" id="search-role" >
			<div class="row">
				<div class="col-2">
					<label class="mr-2" for="">Start date</label>
					<input type="text" class="form-control " id="start_time" name="start_time">
				</div>
				<div class="col-2">
					<label class="mr-2" for="">End date</label>
					<input type="text" class="form-control " id="end_time" name="end_time">
				</div>
			</div>
			<div class="row">
				<div class="col-2">
					<button class="btn btn-success mt-3">Search</button>
				</div>
			</div>
		</form>
		<div class="row mt-3 mb-3">
			<div class="col-4 mt-1">
				<a href="<?php echo base_url('roles/create') ?>" class="btn btn-success col-4">Create role<i
						class="ml-1 fas fa-plus-square"></i></a>
			</div>
		</div>
		<div class="row" id="searchResult">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title text-bold mt-2">All Roles</h3>
					</div>
					<div class="card-body">
						<table id="table-user" class="table table-bordered table-striped">
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

	</div>
	<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</section>
