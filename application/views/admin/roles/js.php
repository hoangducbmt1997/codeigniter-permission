<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/js/bootstrap-datetimepicker.min.js') ?>"></script>

<script>
	$(document).ready(function () {

		$('#start_time').datetimepicker({
			format: 'DD MMM YYYY HH:mm'
		});
		$('#end_time').datetimepicker({
			format: 'DD MMM YYYY HH:mm'
		});

		$("#search-role").submit(function (e) {
			e.preventDefault();

			var start_time = $("#start_time").val();
			var end_time = $("#end_time").val();
			
			$.ajax({
				url: "<?php echo base_url('/roles/search'); ?>",
				method: "POST",
				data: {
					start_date: start_time,
					end_date: end_time
				},
				success: function (response) {

					$("#searchResult").html(response);
					$(function () {
						$(".table-user").DataTable({
							"responsive": true,
							"lengthChange": false,
							"autoWidth": false,
							"pageLength": 10,
						});
					});
				}
			});
		});
	});


</script>
