<script src="<?php echo base_url('/assets/plugins/jquery/jquery.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

<!-- OPTIONAL SCRIPTS -->
<!-- AdminLTE for demo purposes -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->


<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('/assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?php echo base_url('/assets/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('/assets/dist/js/adminlte.min.js') ?>"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


<script>
	// Data tables

	$(function () {
		$("#table-user").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"pageLength": 10,
		});
	});

	$(function () {
		$(".table-user").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"pageLength": 10,
		});
	});


	$(document).ready(function () {
		$('.dataTables_filter').css({
			'display': 'flex',
			'justify-content': 'flex-end'
		});
	});



	// Create  slug
	var input = document.querySelector('.slug');
	if (input) {
		input.addEventListener('input', function (event) {
			var text = event.target.value;
			var slug = slugify(text);
			// Change the value of input to a valid slug
			event.target.value = slug;
		})
	}
	function slugify(text) {
		return text.toString().toLowerCase()
			.replace(/\s+/g, '_') // Replace spaces with underscores
			.replace(/[^\w\-]+/g, '') //Remove invalid characters
			.replace(/\_+/g, '_') //Replace multiple consecutive underscores with one underscore
			.replace(/^-+/, '') // Remove the dash at the beginning
			.replace(/-+$/, ''); // Remove the dash at the end
	}
</script>


<?php
if (isset($js) && !empty($js)) {
	$this->load->view($js);
}
?>
