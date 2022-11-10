<?php
include('../include/dbh.admin.php');
$dbh = new dbHandler();
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<div class="container-fluid">
	<div class="d-flex justify-content-between mx-4">
		<h3><i class="fal fa-ban me-2"></i>Block Accounts</h3>
	</div>
	<hr>
	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<table class="table table-bordered table-striped" id="resultTable">
		<thead>
			<tr>
				<th>Name</th>
				<th>Employee id</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="table">

		</tbody>
	</table>
</div>

<script>
	$(document).ready(function() {
		displayBlockedUser();
	});

	function unblock(id) {
		if (confirm("Are you sure you want to unblock this user?")) {
			$(document).ready(function() {
				$.ajax({
					url: "blocked/unblock.php",
					type: "POST",
					data: {
						unblock: id
					},
					success: function(dataResult) {
						displayBlockedUser();
					},
					error: function(result) {
						console.log(result);
					}
				});
			});
		}
	}

	function displayBlockedUser() {
		$(document).ready(function() {
			$("#table").html("");
			$.ajax({
				url: "blocked/unblock.php",
				type: "POST",
				data: {
					displayBlockedUser: true
				},
				dataType: 'JSON',
				success: function(dataResult) {

					$.each(dataResult, function(i, data) {
						var content = `
						<tr id='user$id'>
							<td>` + data.fullName + `</td>
							<td>` + data.employee_id + `</td>
							<td>` + data.email + `</td>
							<td><button type='button' onclick='unblock(` + data.id + `)' class='unblock btn btn-primary btn-sm'>
								Unblock</button></td>
						</tr>
						`;
						$("#table").append(content);
					});
				},
				error: function(result) {
					console.log(result);
				},
				complete: function() {
					$('#resultTable').DataTable();
				}
			});
		});
	}
</script>