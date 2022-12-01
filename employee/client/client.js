function displayApproveClient(searchQuery = '') {
	$(document).ready(function () {
		// $("#records").html("");
		
		$.ajax({
			type: "POST",
			url: "../client/clientProcess.php",
			data: { displayApprovedUser: true },
			dataType: "JSON",
			success: function (response) {
				var content = ``;
				var filtered = response.filter(function (data) {
					searchQuery = searchQuery.toLowerCase();
					return data.email.includes(searchQuery)
						|| data.fullName.toLowerCase().includes(searchQuery)
						|| data.email.toLowerCase().includes(searchQuery)

				});
				$.each(filtered, function (i, data) {

					content += `
					<button type="button" class="client list-group-item list-group-item-action" data-id='`+ data.id + `'>
						<h5 class="text-capitalize mb-1">`+ data.fullName + `</h5>
						<p class="mb-1">`+ data.email + `</p>
					</button>`;
				});
				$('#list').html(content);
			},
			error: function (dataResult) {
				console.log(dataResult);
			},
			complete: function () {
				$(".client").click(function (e) {
					e.preventDefault();
					$(".client").removeClass("active");
					$(this).addClass("active");
					var userid = $(this).attr("data-id");
					$.ajax({
						url: "../client/clientRecords.php",
						type: "POST",
						data: {
							id: userid
						},
						success: function (dataResult) {
							$("#records").html(dataResult);
							
						},
						error: function (result) {
							console.log(result);
						}
					});
				});
			}
		});
	});
}
function displayPendingClient(searchQuery = '') {
	$(document).ready(function () {
		// $("#records").html("");
		$.ajax({
			type: "POST",
			url: "../client/clientProcess.php",
			data: { displayPendingUser: true },
			dataType: "JSON",
			success: function (response) {
				var content = ``;
				var filtered = response.filter(function (data) {
					searchQuery = searchQuery.toLowerCase();
					return data.email.includes(searchQuery)
						|| data.fullName.toLowerCase().includes(searchQuery)
						|| data.email.toLowerCase().includes(searchQuery)

				});
				$.each(filtered, function (i, data) {

					content += `
					<button type="button" class="client list-group-item list-group-item-action" data-id='`+ data.id + `'>
						<h5 class="text-capitalize mb-1">`+ data.fullName + `</h5>
						<p class="mb-1">`+ data.email + `</p>
					</button>`;
				});
				$('#pending').html(content);
			},
			error: function (dataResult) {
				console.log(dataResult);
			},
			complete: function () {
				$(".client").click(function (e) {
					e.preventDefault();
					$(".client").removeClass("active");
					$(this).addClass("active");
					var userid = $(this).attr("data-id");
					$.ajax({
						url: "../client/clientRecords.php",
						type: "POST",
						data: {
							id: userid
						},
						success: function (dataResult) {
							$("#records").html(dataResult);
						},
						error: function (result) {
							console.log(result);
						}
					});
				});
			}
		});
	});
}
// function displaySchedDetails(){
// $.ajax({
// 	type: "post",
// 	url: "../contactUs/getData.php",
// 	data: { displaySchedDetails: true },
// 	dataType: "json",
// 	success: function (response) {

// 		console.log(response);
// 		var businessVar = '';
// 		$.each(response.businessType, function (indexInArray, data) {
// 			businessVar = response.businessType.join(', ');
// 		});
// 		console.log(businessVar);
// 		$('#editBtnID').attr("data-id", response.client_id);
// 		$('#name_id').val(response.fullName);
// 		$('#contact_id').val(response.contactNo);
// 		$('#email_id').val(response.email);
// 		$('#projLoc_id').val(response.projLocation);
// 		$('#targetCons_id').val(response.targetDate);
// 		$('#projType_id').val(response.projectType);
// 		$('#lotArea_id').val(response.lotArea);
// 		$('#numStorey_id').val(response.noFloors);
// 		$('#business_id').val(businessVar);
// 		$('#meetType_id').val(response.meetType);
// 		$('#meetLoc_id').val(response.meetLoc);
// 		$('#meetDate_id').val(response.appointmentDate);
// 		$('#meetTime_id').val(response.appointmentTime);
// 		valueEdit = response;

// 	}
// });
// }