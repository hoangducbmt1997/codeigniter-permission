<script>
	$(document).ready(function () {

		$("#start_time").datepicker({
			dateFormat: 'dd/MM/yy',
			changeMonth: true,
			changeYear: true,
			yearRange: "-90:+00",
			onSelect: function (dateText, inst) {
				$(this).attr('value', dateText);
			}
		});

		$("#end_time").datepicker({
			dateFormat: 'dd/MM/yy',
			changeMonth: true,
			changeYear: true,
			yearRange: "-90:+00",
			onSelect: function (dateText, inst) {
				$(this).attr('value', dateText);
			}
		});

		$("#search-permission").submit(function (e) {
			e.preventDefault();

			var start_time = $("#start_time").val();
			var end_time = $("#end_time").val();

			var formatted_start_time = moment(start_time, "DD/MMM/YYYY").format("DD/MM/YYYY");
			var formatted_end_time = moment(end_time, "DD/MMM/YYYY").format("DD/MM/YYYY");

			$.ajax({
				url: "<?php echo base_url('/permissions/search'); ?>",
				method: "POST",
				data: {
					start_date: formatted_start_time,
					end_date: formatted_end_time
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
