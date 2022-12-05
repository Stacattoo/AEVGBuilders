
function displayUsers(searchQuery='') {
	$(document).ready(function () {
		// $("#records").html("<h1>hi guys</h1>");
		$.ajax({
			type: "POST",
			url: "employee/employeeProcess.php",
			data: { displayUsers: true },
			dataType: "JSON",
			success: function (response) {
				var content = ``;
				var filtered = response.filter(function(data) {
					searchQuery = searchQuery.toLowerCase();
					return data.id.includes(searchQuery) 
					|| data.fullName.toLowerCase().includes(searchQuery)
					|| data.email.toLowerCase().includes(searchQuery); 
				});
				$.each(filtered, function (i, data) {
					content += `
					<button type="button" class="client list-group-item list-group-item-action" data-id='`+ data.id + `'>
						<div class="row d-flex align-items-center" >
							<div class="col-3 text-center">
								<img id="view_profile" src="../employee/profile/${data.profile_picture}" class="rounded-circle border-0 " style=" height:70px; width:70px;">
							</div>
							<div class="col ">
								<div id="view-fullName" class="mb-1 text-capitalize h5"><b>${data.fullName}</b></div>
								<div class="mb-1"><span id="view-email">${data.email}</span></div>
								
							</div>
						</div>
					</button>`;
				});
				$('#list').html(content);

				$(".client").click(function (e) {
					e.preventDefault();
					$(".client").removeClass("active");
					$(this).addClass("active");
					var userid = $(this).data("id");
					$.ajax({
						url: "employee/employeeRecords.php",
						type: "POST",
						data: { STUDENT_ID: userid },
						success: function (dataResult) {
							$("#records").html(dataResult);

						},
						error: function (result) {
							console.error(result);
						}
					});
				});
			},
			error: function (dataResult) {
				console.log(dataResult);
				$("#error").html(dataResult.responseText);
			}
		});
	});
}

$(document).ready(function () {
	console.log("asd");
	console.log($("#addSpinner"));
	$("#addSpinner").hide();
	$("#addEmployeeForm").submit(function (e) { 
		e.preventDefault();
		var data = $(this).serializeArray();  // Form Data
        data.push({ name: 'ADD_EMPLOYEE_REQ', value: true });
		$.ajax({
			type: "POST",
			url: "employee/employeeProcess.php",
			data: data,
			dataType: "JSON",
			success: function (ADD_EMPLOYEE_RESP) {
				console.log(ADD_EMPLOYEE_RESP);
				if (ADD_EMPLOYEE_RESP) {
					displayUsers();
					$("#addEmployeeModal").modal("hide");
				} else {
					console.error(ADD_EMPLOYEE_RESP);
					$("#error").html(ADD_EMPLOYEE_RESP.msg);
				}
				$("#addBtn").removeAttr("disabled");
				$("#addSpinner").hide();
			}, error: function(response) {
				console.error(response.responseText);
				$("#error").html(response.responseText);
			}, beforeSend: function() {
				$("#addBtn").attr("disabled", true);
				$("#addSpinner").show();
			}
		});
	});

	$("#editEmployeeForm").submit(function (e) { 
		e.preventDefault();
		var data = $(this).serializeArray();  // Form Data
        data.push({ name: 'EDIT_EMPLOYEE_REQ', value: true });
		$.ajax({
			type: "POST",
			url: "employee/employeeProcess.php",
			data: data,
			dataType: "JSON",
			success: function (EDIT_EMPLOYEE_RESP) {
				console.log(EDIT_EMPLOYEE_RESP);
				if (EDIT_EMPLOYEE_RESP) {
					displayUsers();
					$("#editEmployeeModal").modal("hide");
				} else {
					console.error(EDIT_EMPLOYEE_RESP);
					$("#error").html(EDIT_EMPLOYEE_RESP.msg);
				}
			}, error: function(response) {
				$("#error").html(response.responseText);
			}
		});
	});


});
