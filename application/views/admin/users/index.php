<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title text-bold">All Users</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table cellspacing="5" cellpadding="5">
							<form method="POST" id="search-user" class="d-flex mb-3">
								<tr>
									<label class="mr-2" for="">Start date</label>
									<input type="text" class="form-control col-2" id="start_time"  name="start_time">
								</tr>
								<tr>
									<label class="mr-2" for="">End date</label>
									<input type="text" class="form-control col-2" id="end_time"  name="end_time">
								</tr>
								<tr>
									<button class="btn btn-success mt-3">Search</button>
								</tr>
							</form>
						</table>
						<table id="table-user" class="display nowrap" style="width:100%">
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
								<?php foreach ($users as $user): ?>
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
			<!-- /.col -->
		</div>
		<div class="row">
			<div class="col-4 mt-1">
				<a href="<?php echo base_url('users/create') ?>" class="btn btn-success col-4">Create User <i
						class="ml-1 fas fa-plus-square"></i></a>
				<a href="<?php echo base_url('users/export') ?>" class="btn btn-primary col-4">Export Excel <i
						class=" ml-1 fas fa-file-download"></i></a>
			</div>
			<div class="col-8 mt-1 ">
				<form action="<?= base_url('users/import') ?>" method="post" enctype="multipart/form-data">
					<div class="d-flex col-6">
						<input type="file" class="form-control col-6" name="excel_file">
						<button class=" btn btn-info col-4 ml-1">
							Import Excel <i class="ml-1 fas fa-file-import"></i></button>
					</div>
				</form>
			</div>
		</div>
		<div id="searchResult" class="row">

		</div>
	</div>
	<!-- /.row -->
</section>
