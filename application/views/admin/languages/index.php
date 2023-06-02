<section class="content">

	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<form method="POST" id="search-language">
					<div class="row">
						<div class="col-2">
							<label class="mr-2" for="">
								<?php echo $this->lang->line('label_start_date') ?>
							</label>
							<input type="text" class="form-control " id="start_time" name="start_time">
						</div>
						<div class="col-2">
							<label class="mr-2" for="">
								<?php echo $this->lang->line('label_end_date') ?>
							</label>
							<input type="text" class="form-control " id="end_time" name="end_time">
						</div>
					</div>
					<div class="row">
						<div class="col-2">
							<button class="btn btn-success mt-3">
								<?php echo $this->lang->line('btn_search') ?>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="row mt-3 d-flex justify-content-end mb-3">
			<div class="col-4 d-flex justify-content-end">
				<a href="<?php echo base_url('language/create') ?>" class="btn btn-success col-5">Create<i class="ml-1 fas fa-plus-square"></i></a>
			</div>
		</div>
		<div class="row" id="searchResult">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title text-bold mt-2">
							All Config Language
						</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="table-user" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>
										Key
									</th>
									<th>
										Value
									</th>
									<th>
									Language Code
									</th>
									<th class="text-center">
										Action
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								?>
								<?php foreach ($languages as $language): ?>

									<tr>
										<td>
											<?php echo $language->id ?>
										</td>
										<td>
											<?php echo $language->key_name ?>
										</td>
										<td>
											<?php echo $language->value ?>
										</td>
										<td>
											<?php echo $language->lang_code ?>
										</td>
										<td class="text-center">
											<a class="btn btn-success"
												href="<?php echo base_url('language/edit/' . $language->id) ?>"><?php echo $this->lang->line('btn_edit') ?></a>
											<a class="btn btn-danger"
												href="<?php echo base_url('language/delete/' . $language->id) ?>"><?php echo $this->lang->line('btn_delete') ?></a>
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
