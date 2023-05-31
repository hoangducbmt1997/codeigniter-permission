<!-- Main content -->
<section class="content">
	<div class="container-fluid">

		<div class="row">
			<!-- left column -->
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header">
						<h6 class="card-title mt-2">Edit permissions for:
							<?php echo $role->name; ?>
						</h6>
					</div>

					<form action="<?php echo site_url('role/permissions/update'); ?>" method="POST">
						<input type="hidden" name="role_id" value="<?php echo $role->id; ?>">


						<div class="card-body">
							<h6 class="mb-3 mt-3">User action:</h6>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>User</th>
										<?php foreach ($user_action as $user_action_item): ?>
											<th>
												<?php echo $user_action_item['action']; ?>
											</th>
										<?php endforeach; ?>
									</tr>
								</thead>

								<tbody>
									<tr>
										<td>Action</td>
										<?php foreach ($user_action as $user_action_item): ?>
											<td>

												<input type="checkbox" name="selected_permissions[]"
													value="<?php echo $user_action_item['permission_id']; ?>" <?php
													   foreach ($assigned_permissions as $assigned_permission) {
														   if ($user_action_item['permission_id'] == $assigned_permission->id) {
															   echo 'checked';
														   }
													   }
													   ?>>
											</td>
										<?php endforeach; ?>
									</tr>
								</tbody>
							</table>
							<h6 class="mb-3 mt-3">Role action:</h6>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Role</th>
										<?php foreach ($role_action as $role_action_item): ?>
											<th>
												<?php echo $role_action_item['action']; ?>
											</th>
										<?php endforeach; ?>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Action</td>
										<?php foreach ($role_action as $role_action_item): ?>
											<td>
												<input type="checkbox" name="selected_permissions[]"
													value="<?php echo $role_action_item['permission_id']; ?>" <?php
													   foreach ($assigned_permissions as $assigned_permission) {
														   if ($role_action_item['permission_id'] == $assigned_permission->id) {
															   echo 'checked';
														   }
													   }
													   ?>>
											</td>
										<?php endforeach; ?>
									</tr>
								</tbody>
							</table>
							<h6 class="mb-3 mt-3">Permissions action:</h6>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Permissions</th>
										<?php foreach ($permissions_action as $permissions_action_item): ?>
											<th>
												<?php echo $permissions_action_item['action']; ?>
											</th>
										<?php endforeach; ?>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Action</td>
										<?php foreach ($permissions_action as $permissions_action_item): ?>
											<td>
												<input type="checkbox" name="selected_permissions[]"
													value="<?php echo $permissions_action_item['permission_id']; ?>" <?php
													   foreach ($assigned_permissions as $assigned_permission) {
														   if ($permissions_action_item['permission_id'] == $assigned_permission->id) {
															   echo 'checked';
														   }
													   }
													   ?>>
											</td>
										<?php endforeach; ?>
									</tr>
								</tbody>
							</table>
							<button type="submit" class="btn btn-success mt-3">Save Permissions</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
