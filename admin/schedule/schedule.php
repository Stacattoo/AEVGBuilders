<?php
include('../include/dbh.admin.php');
$dbh = new dbHandler();
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


<script src="schedule/schedule.js"></script>

<div class="container-fluid">
	<div class="d-flex justify-content-between mx-4">
		<h3><i class="fad fa-calendar-alt bi me-2"></i></i>Schedule</h3>
	</div>
	<hr>
	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>

	<div id="tableContainer">
		<table class="table table-bordered table-striped" id="resultTable" cellspacing="0" cellpadding="5" border="1">
			<thead>
				<tr>
					<th scope="col">Client Name</th>
					<th scope="col">Employee Name</th>
					<th scope="col">Employee ID</th>
					<th scope="col">Status</th>
					<th scope="col">Meeting Schedule</th>
				</tr>
			</thead>
			<tbody id="table">

			</tbody>

		</table>
	</div>
	<div id="output">

	</div>
</div>


<script>
	$(document).ready(function() {
		displaySched();

		function displaySched() {
			$.ajax({
				url: "schedule/scheduleProcess.php",
				type: "POST",
				data: {
					displayResults: true
				},
				dataType: 'JSON',
				success: function(result) {
					var content = ``;
					$.each(result, function(i, data) {
						content += `
                    <tr>
                    <td>` + data.clientName + `</td>
                    <td>` + data.employeeName + `</td>
                    <td>` + data.employee_id + `</td>
                    <td>` + data.status + `</td>
                    <td>` + data.tranaction_date + `</td>
                    
                    </tr>
                    `;
					});
					$('#table').html(content);
				},
				error: function(errorres) {}
			});
		}
	});
</script>