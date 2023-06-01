<section class="content">

	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<form method="POST" id="search-permission">
					<div class="row">
						<div class="col-2">
							<label class="mr-2" for=""><?php echo $this->lang->line('label_start_date') ?></label>
							<input type="text" class="form-control " id="start_time" name="start_time">
						</div>
						<div class="col-2">
							<label class="mr-2" for=""><?php echo $this->lang->line('label_end_date') ?></label>
							<input type="text" class="form-control " id="end_time" name="end_time">
						</div>
					</div>
					<div class="row">
						<div class="col-2">
							<button class="btn btn-success mt-3"><?php echo $this->lang->line('btn_search') ?></button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="row mt-3 d-flex justify-content-end mb-3">
			<div class="col-4 d-flex justify-content-end">
				<a href="<?php echo base_url('permissions/create') ?>" class="btn btn-success col-5"><?php echo $this->lang->line('btn_create_permission') ?><i
						class="ml-1 fas fa-plus-square"></i></a>
			</div>
		</div>
		<div class="row" id="searchResult">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title text-bold mt-2"><?php echo $this->lang->line('title_permissions') ?></h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="table-user" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th><?php echo $this->lang->line('label_action') ?></th>
									<th><?php echo $this->lang->line('label_created_at') ?></th>
									<th><?php echo $this->lang->line('label_updated_at') ?></th>
									<th class="text-center"><?php echo $this->lang->line('label_action') ?></th>
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
												href="<?php echo base_url('permissions/edit/' . $permission->id) ?>"><?php echo $this->lang->line('btn_edit') ?></a>
											<a class="btn btn-danger"
												href="<?php echo base_url('permissions/delete/' . $permission->id) ?>"><?php echo $this->lang->line('btn_delete') ?></a>
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

	<div id="searchResult" class="row">

	</div>
	</div>

	<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</section>
