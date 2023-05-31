<!-- Main content -->
<section class="content ">
	<div class="container-fluid ">
		<div class="row">
			<!-- left column -->
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title mt-2">Edit role for:
							<?php echo $user->username; ?>
						</h3>
					</div>
					<form action="<?php echo site_url('user/role/update'); ?>" method="POST">
						<div class="card-body">
							<input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
							<select class="form-select" name="selected_role">
								<li>
									<option value ="0">Please select one</option>
								</li>
								<?php foreach ($all_roles as $role):
									?>


									<li>
										<option value="<?php echo $role->id; ?>" <?php
										   foreach ($assigned_roles as $assigned_role) {
											   if ($role->id == $assigned_role->id) {
												   echo 'selected';
											   }
										   }
										   ?>>
											<?php echo $role->name; ?>
									</li>
								<?php endforeach; ?>
							</select>
							<button type="submit" class="btn btn-success mt-3 ">Save Roles</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
