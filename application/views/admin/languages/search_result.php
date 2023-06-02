<div class="col-12">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title text-bold mt-2">
				All Config Language
			</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table class="table table-user table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>
							<?php echo $this->lang->line('label_action') ?>
						</th>
						<th>
							<?php echo $this->lang->line('label_created_at') ?>
						</th>
						<th>
							Key
						</th>
						<th class="text-center">
							Value
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
					?>
					<?php foreach ($search_result as $language): ?>

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
